import './bootstrap';
import Alpine from 'alpinejs';
import 'tw-elements';
import {drag, dragend, dragover, drop} from "./dragndrop";
import {removeFromOutfit, click} from "./click-actions";
import {createTag} from "./tags";
import {createRandomOutfit} from "./outfits";
import {clearOutfit, saveOutfit} from "./forms";

window.Alpine = Alpine;
Alpine.start();

export const defaultSrc = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="
export const outfit = document.querySelectorAll('#outfit > div img');
const activeTabClass = ['font-bold', 'text-blue-500', 'underline', 'underline-offset-4', 'decoration-inherit', 'cursor-pointer', 'hover:text-blue-400'];
const inactiveTabClass = ['font-medium', 'text-black', 'cursor-pointer', 'hover:text-gray-600'];

if(window.location.href.includes('create')){
    const uploadOptions = document.querySelector('select[name="img_options"]');
    const files = document.querySelector('input[name="image"]');

    uploadOptions.addEventListener('change', (ev) => {
        const inactiveOption = ['image_url', 'dropzone-file'].filter(option => option !== uploadOptions.value).toString();

        document.getElementById(uploadOptions.value).closest('div .mb-6').classList.remove('hidden');
        document.getElementById(inactiveOption).closest('div .mb-6').classList.add('hidden');
    })

    files.addEventListener('change', () => {
       document.getElementById('preview').src = window.URL.createObjectURL(files.files[0]);
       document.getElementById('uploadSvg').remove();
    })
} else if(window.location.href.includes('edit')) {
    const files = document.querySelector('input[name="image"]');

    files.addEventListener('change', () => {
       document.getElementById('preview').src = window.URL.createObjectURL(files.files[0]);
    })
} else {
    runListeners();

    document.querySelector('#randomize').addEventListener('click', createRandomOutfit)
    document.querySelector("#save").addEventListener('click', saveOutfit);
    document.querySelector("#clear").addEventListener('click', clearOutfit)

    document.querySelectorAll('#tabs-switcher button').forEach(button => {
        button.addEventListener('click', () => switchTabTo(button.id));
    })
}

export function getOutfitPart(id){
    return document.querySelector(`#outfit #${id === 'accessories'
        ? id + '-' + (Math.floor(Math.random() * 2) + 1)
        : id
    }`);
}

export function runListeners() {
    document.querySelectorAll('#accordion img').forEach(function (item) {
        item.classList.add('cursor-move');

        item.setAttribute('draggable', true);

        item.addEventListener('click', click)
        item.addEventListener('dragstart', drag);
        item.addEventListener('dragend', dragend);
    });

    document.querySelectorAll('#outfit img').forEach(function (item) {
        item.parentElement.addEventListener('click', removeFromOutfit)
        item.parentElement.addEventListener('drop', drop);
        item.parentElement.querySelector('p').addEventListener('dragover', dragover);
    });

    document.querySelectorAll('#outfitsAccordion img').forEach(function (item) {
        item.addEventListener('click', click);
    })
}

export function showActions() {
    const outfitImages = [...outfit].map((item) => {return item.src !== defaultSrc});
    const actions = document.querySelector("#actions");

    if(outfitImages.includes(true)) actions.classList.add('opacity-100');
    else actions.classList.remove('opacity-100');
}

function switchTabTo(activeTab){
    const inactiveTab = ['wardrobe-tab', 'outfits-tab'].filter(tab => tab !== activeTab).toString();

    document.getElementById(activeTab).classList.remove(...inactiveTabClass);
    document.getElementById(activeTab).classList.add(...activeTabClass);

    document.getElementById(inactiveTab).classList.remove(...activeTabClass);
    document.getElementById(inactiveTab).classList.add(...inactiveTabClass);

    if(activeTab === 'outfits-tab'){
        document.getElementById("accordion").classList.add('hidden');
        document.getElementById("outfitsAccordion").classList.remove('hidden');
    } else if(activeTab === 'wardrobe-tab'){
        document.getElementById("accordion").classList.remove('hidden');
        document.getElementById("outfitsAccordion").classList.add('hidden');
    }
}
