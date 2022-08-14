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

export const baseUrl = 'http://wardrobe.test';
export const defaultSrc = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="
export const outfit = document.querySelectorAll('#outfit > div img');

if(window.location.href.includes('create')){
    document.querySelector('#upload #tags').addEventListener('keyup', createTag);
} else if(window.location.href.includes('outfit')){
    runListeners();

    document.querySelector('#randomize').addEventListener('click', createRandomOutfit)
    document.querySelector("#save").addEventListener('click', saveOutfit);
    document.querySelector("#clear").addEventListener('click', clearOutfit);
}

export function getOutfitPart(id){
    return document.querySelector(`#outfit #${id}`);
}

export function runListeners(){
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
}

export function showActions() {
    const outfitImages = [...outfit].map((item) => {return item.src !== defaultSrc});
    const actions = document.querySelector("#actions");

    if(outfitImages.includes(true)) actions.classList.add('opacity-100');
    else actions.classList.remove('opacity-100');
}
