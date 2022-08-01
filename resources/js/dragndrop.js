import {getOutfitPart, defaultSrc} from "./app";
import {toggleEquipped, removeFromOutfit } from "./click-actions";

export function drag(ev) {
    ev.target.classList.add('opacity-20');
    const parentId = ev.target.parentElement.parentElement.parentElement.id;

    getOutfitPart(parentId).classList.add('brightness-90');

    ev.dataTransfer.effectAllowed = "move";
    ev.dataTransfer.setDragImage(ev.target, ev.target.width / 2, ev.target.height / 2);
    ev.dataTransfer.setData("src", ev.target.src);
    ev.dataTransfer.setData("parent", parentId);
}

export function dragover(ev) {
    ev.preventDefault();
}

export function dragend() {
    this.classList.remove('opacity-20');

    const parentId = this.parentElement.parentElement.parentElement.id;
    const image =  getOutfitPart(parentId);
    image.classList.remove('brightness-90');

    if(image.src === this.src){
        this.remove();
    }
}

export function drop(ev) {
    ev.preventDefault();
    const parentImg = ev.target.parentElement.querySelector('img');

    ev.dataTransfer.dropEffect = "move"
    if (ev.dataTransfer.getData("parent") === parentImg.id) {
        if(parentImg.src !== defaultSrc){
            removeFromOutfit(ev);
        }
        parentImg.src = ev.dataTransfer.getData("src");
        toggleEquipped(parentImg);
    }
}
