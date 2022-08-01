export function createTag(event){
    const listOfTags = document.querySelector('#upload #tags');
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

export function removeTag(event){
    if(event.target.parentElement.tagName === 'LI'){
        event.target.parentElement.remove();
    }
}
