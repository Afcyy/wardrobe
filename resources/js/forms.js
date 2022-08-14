import {defaultSrc, showActions} from "./app";
import {fromOutfitToWardrobe} from "./click-actions";

export function saveOutfit(e) {
    const obj = {};
    document.querySelectorAll('#outfit > div img').forEach((item) => {
        obj[item.id] = item.src;
    })

    fetch("http://wardrobe.test/save-outfit", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
        },
        body: JSON.stringify(obj)
    }).then(r => clearOutfit());
}

export function clearOutfit(e){
    document.querySelectorAll('#outfit > div img').forEach(function (item) {
        if(item.src !== defaultSrc) {
            fromOutfitToWardrobe(item.parentElement, item, item.id);
        }
    });

    showActions();
}
