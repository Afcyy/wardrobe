import {baseUrl, defaultSrc, outfit, showActions} from "./app";
import {fromOutfitToWardrobe} from "./click-actions";

export function saveOutfit(e) {
    const obj = {};
    outfit.forEach((item) => {
        obj[item.id] = item.src;
    })

    fetch("/save-outfit", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
        },
        body: JSON.stringify(obj)
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
