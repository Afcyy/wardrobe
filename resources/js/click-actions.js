import {defaultSrc, getOutfitPart, runListeners, showActions} from "./app";

export function click(ev) {
    const parent = ev.target.closest('.accordion-container');

    if (parent.id === 'accordion') {
        fromWardrobeToOutfit(ev.target.src, ev.target.closest('.accordion-item').id);

        ev.target.parentElement.remove();
    } else {
        document.querySelectorAll('#outfit img').forEach(image => image.src = defaultSrc);

        ev.target.closest('.accordion-body').querySelectorAll('img').forEach(image => {
            fromWardrobeToOutfit(image.src, image.id);
            document.querySelector(`#accordion img[src='${image.src}']`)?.remove();
        });
    }
}

function fromWardrobeToOutfit(targetSrc, targetId) {
    const outfitPart = getOutfitPart(targetId);

    if (outfitPart.src !== defaultSrc) {
        fromOutfitToWardrobe(outfitPart.parentElement, outfitPart, outfitPart.id)
    }

    outfitPart.src = targetSrc;
    toggleEquipped(outfitPart);
}

export function removeFromOutfit(ev) {
    const parent = ev.target.parentNode;
    const image = parent.querySelector('img');

    if (image.src !== defaultSrc) {
        fromOutfitToWardrobe(parent, image, image.id);
        showActions();
    }
}

export function fromOutfitToWardrobe(parent, image, id) {
    const wardrobePart = document.querySelector(`#accordion #${id.split("-")[0]} .accordion-collapse .accordion-body`);

    if (!wardrobePart.querySelector(`img[src='${image.src}']`)) {
        wardrobePart.insertAdjacentHTML('afterbegin', `<div class="image-holder relative group">
             <img
                 src="${image.src}"
                 class="my-2 mx-2 p-1 bg-white border rounded lg:h-32 h-28 group-hover:brightness-50"
                 alt="..."
             />

             <a href="http://wardrobe.local.test/clothes/22/edit" class="flex text-sm rounded-full md:mr-0 absolute right-5 top-5 opacity-0 group-hover:opacity-100">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit stroke-white"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
             </a>
         </div>`);
    }

    image.src = defaultSrc;
    toggleEquipped(image);
    runListeners();
}

export function toggleEquipped(outfitPart) {
    outfitPart.classList.toggle('group-hover:opacity-30');
    outfitPart.parentNode.classList.add('cursor-pointer');
    outfitPart.parentNode.querySelector('p').classList.toggle('group-hover:opacity-100');
    outfitPart.parentNode.querySelector('p').classList.toggle('cursor-default');

    showActions();
}
