import {baseUrl, defaultSrc, getOutfitPart, outfit, showActions} from "./app";
import {fromOutfitToWardrobe} from "./click-actions";

export function saveOutfit(e) {
    const items = [];

    outfit.forEach((item) => {
        if(item.src !== defaultSrc && item.dataset.clothingId){
            items.push(parseInt(item.dataset.clothingId))
        }
    })

    fetch("/save-outfit", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
        },
        body: JSON.stringify({'data': items})
    }).then(r => window.location.reload());
}

export function clearOutfit(e){
    outfit.forEach(function (item) {
        if(item.src !== defaultSrc) {
            fromOutfitToWardrobe(item.parentElement, item, item.id);
        }
    });

    showActions();
}
