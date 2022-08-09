import {defaultSrc, getOutfitPart, runListeners, showActions} from "./app";

export function click(ev) {
    const targetSrc = ev.target.src;
    const parentId = ev.target.parentElement.parentElement.parentElement.id;
    const outfitPart =  getOutfitPart(parentId);

    if(outfitPart.src !== defaultSrc){
        fromOutfitToWardrobe(outfitPart.parentElement, outfitPart, outfitPart.id)
    }

    outfitPart.src = targetSrc;
    toggleEquipped(outfitPart);

    ev.target.remove();
}

export function removeFromOutfit(ev) {
    const parent = ev.target.parentNode;
    const image = parent.querySelector('img');

    if(image.src !== defaultSrc){
        fromOutfitToWardrobe(parent, image, image.id);
        showActions(false)
    }
}

export function fromOutfitToWardrobe(parent, image, id){
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

export function toggleEquipped(outfitPart){
    outfitPart.classList.toggle('group-hover:opacity-30');
    outfitPart.parentNode.classList.add('cursor-pointer');
    outfitPart.parentNode.querySelector('p').classList.toggle('group-hover:opacity-100');
    outfitPart.parentNode.querySelector('p').classList.toggle('cursor-default');

    showActions();
}
