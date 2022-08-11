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
    });
}
