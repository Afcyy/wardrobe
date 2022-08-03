import {getOutfitPart, defaultSrc} from "./app";
import {toggleEquipped, removeFromOutfit, fromOutfitToWardrobe} from "./click-actions";

export function createRandomOutfit()
{
    document.querySelectorAll('.accordion .accordion-flush > div').forEach(function (item) {
        if(item.id === 'header') return;

        const allImages = item.querySelectorAll('img');
        const randomNum = Math.floor(Math.random() * allImages.length);
        const randomImage = allImages.item(randomNum);

        const outfitPart = getOutfitPart(item.id);

        if(outfitPart.src !== defaultSrc){
            fromOutfitToWardrobe(outfitPart.parentElement, outfitPart, outfitPart.id);
        }

        outfitPart.src = randomImage.src;
        toggleEquipped(outfitPart);

        randomImage.remove();
    })
}
