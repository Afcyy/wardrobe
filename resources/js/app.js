import './bootstrap';

import Alpine from 'alpinejs';

import 'tw-elements';

window.Alpine = Alpine;
Alpine.start();

const defaultSrc = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="

if(window.location.href.includes('dashboard')){
    runListeners();

    document.querySelector('#randomize').addEventListener('click', () => {
        document.querySelectorAll('.accordion .accordion-flush > div').forEach(function (item) {
            const allImages = item.querySelectorAll('img');
            const randomNum = Math.floor(Math.random() * allImages.length);
            const randomImage = allImages.item(randomNum);

            const outfitPart = document.querySelector(`#outfit #${item.id}`);

            if(outfitPart.src !== defaultSrc){
                fromOutfitToWardrobe(outfitPart.parentElement, outfitPart, outfitPart.id);
            }

            outfitPart.src = randomImage.src;
            toggleEquipped(outfitPart);

            randomImage.remove();
        })
    })
}

if(window.location.href.includes('upload')){
    const listOfTags = document.querySelector('#upload #tags');
    listOfTags.addEventListener('keyup', createTag);

    function createTag(event){
        if (event.code === 'Enter') {
            const input = listOfTags.querySelector('input');

            if(input.value.trim() !== ''){
                const li = document.createElement("li");
                li.addEventListener('click', removeTag);
                li.classList.add('mr-1', 'mt-2', 'bg-gray-200', 'rounded-md', 'px-4', 'py-2', 'flex', 'cursor-pointer','overflow-hidden');
                li.appendChild(document.createTextNode(input.value));

                const span = document.createElement("span");
                span.classList.add('flex', 'items-center', 'justify-center', 'w-4', 'ml-2', 'hover:rounded-full', 'hover:rounded-full', 'hover:bg-gray-300');
                span.appendChild(document.createTextNode('x'));
                li.appendChild(span);

                listOfTags.appendChild(li);
                input.value = '';
            }
        }
    }

    function removeTag(event){
        if(event.target.parentElement.tagName === 'LI'){
            event.target.parentElement.remove();
        }
    }
}

function drag(ev) {
    ev.target.classList.add('opacity-20');
    const parentId = ev.target.parentElement.parentElement.parentElement.id;

    document.querySelector(`#outfit #${parentId}`).classList.add('brightness-90');

    ev.dataTransfer.effectAllowed = "move";
    ev.dataTransfer.setDragImage(ev.target, ev.target.width / 2, ev.target.height / 2);
    ev.dataTransfer.setData("src", ev.target.src);
    ev.dataTransfer.setData("parent", parentId);
}

function dragover(ev) {
    ev.preventDefault();
}

function dragend() {
    this.classList.remove('opacity-20');

    const parentId = this.parentElement.parentElement.parentElement.id;
    const image = document.querySelector(`#outfit #${parentId}`);
    image.classList.remove('brightness-90');

    if(image.src === this.src){
        this.remove();
    }
}

function drop(ev) {
    ev.preventDefault();
    const parentImg = ev.target.parentElement.querySelector('img');

    ev.dataTransfer.dropEffect = "move"
    if (ev.dataTransfer.getData("parent") === parentImg.id) {
        if(parentImg.src !== defaultSrc){
            undoClick(ev);
        }
        parentImg.src = ev.dataTransfer.getData("src");
        toggleEquipped(parentImg);
    }
}

function click(ev) {
    const targetSrc = ev.target.src;
    const parentId = ev.target.parentElement.parentElement.parentElement.id;
    const outfitPart = document.querySelector(`#outfit #${parentId}`);

    if(outfitPart.src !== defaultSrc){
        fromOutfitToWardrobe(outfitPart.parentElement, outfitPart, outfitPart.id)
    }

    outfitPart.src = targetSrc;
    toggleEquipped(outfitPart);

    ev.target.remove();
}

function toggleEquipped(outfitPart){
    outfitPart.classList.toggle('group-hover:opacity-30');
    outfitPart.parentNode.classList.add('cursor-pointer');
    outfitPart.parentNode.querySelector('p').classList.toggle('group-hover:opacity-100');
    outfitPart.parentNode.querySelector('p').classList.toggle('cursor-default');
}

function undoClick(ev) {
    const parent = ev.target.parentNode;
    const image = parent.querySelector('img');

    if(image.src !== defaultSrc){
        fromOutfitToWardrobe(parent, image, image.id);
    }
}

function fromOutfitToWardrobe(parent, image, id){
    const wardrobePart = document.querySelector(`#accordion #${id} .accordion-collapse .accordion-body`);
    const returnedPiece = document.createElement('img');
    returnedPiece.src = image.src;
    returnedPiece.classList.add('my-2', 'mx-2', 'p-1', 'bg-white', 'border', 'rounded', 'lg:h-44', 'h-32')
    returnedPiece.draggable = true;
    wardrobePart.appendChild(returnedPiece);

    image.src = defaultSrc;

    toggleEquipped(image);
    runListeners();
}

function runListeners(){
    document.querySelectorAll('#accordion img').forEach(function (item) {
        item.classList.add('cursor-move');

        item.setAttribute('draggable', true);

        item.addEventListener('click', click)
        item.addEventListener('dragstart', drag);
        item.addEventListener('dragend', dragend);
    });

    document.querySelectorAll('#outfit img').forEach(function (item) {
        item.parentElement.addEventListener('click', undoClick)
        item.parentElement.addEventListener('drop', drop);
        item.parentElement.querySelector('p').addEventListener('dragover', dragover);
    });
}
