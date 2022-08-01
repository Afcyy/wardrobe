<x-app-layout>
    <div class="w-screen">
        <div class="flex justify-center items-center mx-auto sm:px-6 lg:px-8 h-screen">
            <form id="upload"
                  class="bg-white shadow-sm rounded-md h-4/5 w-11/12 flex flex-col justify-center items-center" onkeydown="return event.key !== 'Enter';">
                <div class="mb-6 w-2/4 h-auto">
                    <label for="tags" class="mb-4 text-sm font-medium text-gray-900">Tags</label>
                    <ul id="tags" class="overflow-y-auto max-h-48 flex items-center p-2 border border-gray-200 rounded-lg whitespace-nowrap flex-wrap scrollbar">
                        <input type="text" id="tags"
                               class="border border-gray-200 w-full bg-gray-50 border-none text-gray-900 text-sm rounded-lg block w-full p-2.5"
                               required>
                    </ul>
                </div>

                <div class="mb-6 w-2/4 h-fit">
                    <label for="season" class="mb-4 text-sm font-medium text-gray-900">Season</label>
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center pl-3">
                                <input id="autumn" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <label for="autumn"
                                       class="py-3 ml-2 w-full text-sm font-medium text-gray-900">Autumn</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center pl-3">
                                <input id="summer" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <label for="summer"
                                       class="py-3 ml-2 w-full text-sm font-medium text-gray-900">Summer</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center pl-3">
                                <input id="spring" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <label for="spring"
                                       class="py-3 ml-2 w-full text-sm font-medium text-gray-900">Spring</label>
                            </div>
                        </li>
                        <li class="w-full">
                            <div class="flex items-center pl-3">
                                <input id="winter" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <label for="winter"
                                       class="py-3 ml-2 w-full text-sm font-medium text-gray-900">Winter</label>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="mb-6 w-2/4 h-fit">
                    <label for="image" class="mb-4 text-sm font-medium text-gray-900">Image</label>
                    <div class="flex justify-center items-center w-full">
                        <label for="dropzone-file"
                               class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 200Kb)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden"/>
                        </label>
                    </div>
                </div>

                <button type="button"
                        class="w-2/4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                    Add to wardrobe
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
