<x-app-layout>
    <form action="{{ route('clothes.store') }}" method="POST" enctype="multipart/form-data" id="upload"
          class="bg-white shadow-sm rounded-md h-4/5 w-11/12"
          onkeydown="return event.key !== 'Enter';">
        <div class="w-full h-full flex flex-col items-center my-2 overflow-y-scroll scrollbar md:justify-center">
            {{ csrf_field() }}

            <div class="my-6 w-2/4 h-auto">
                <label for="category" class="text-sm font-medium text-gray-900">Category</label>
                <select name="category" id="categories"
                        class="mt-1 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected disabled>Choose a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6 w-2/4 h-auto">
                <label for="tags" class="text-sm font-medium text-gray-900">Tags <span class="text-gray-500 text-xs font-normal">(Optional)</span></label>
                <input type="text" name="tags" id="tags"
                       class="mt-1 border border-gray-200 w-full bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <p class="text-sm text-gray-500">Separate tags with commas e.g - Comfortable, Stylish, etc.</p>
            </div>

            <div class="mb-6 w-2/4 h-fit">
                <label for="season" class="text-sm font-medium text-gray-900">Season</label>
                <ul class="mt-1 items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex">
                    @foreach($seasons as $season)
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center pl-3">
                                <input name="season[]" id="{{ $season->name }}" type="checkbox" value="{{ $season->id }}"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <label for="{{ $season->name }}"
                                       class="py-3 ml-2 w-full text-sm font-medium text-gray-900">{{ ucfirst($season->name) }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-6 w-2/4 h-auto">
                <label for="img_options" class="text-sm font-medium text-gray-900">Upload photo</label>
                <select name="img_options" id="img_options"
                        class="mt-1 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="image_url" selected>From URL</option>
                    <option value="dropzone-file">From my files</option>
                </select>
            </div>

            {{--Image options--}}
                <div class="mb-6 w-2/4 h-auto">
                    <label for="image_url" class="text-sm font-medium text-gray-900">Image URL</label>
                    <input type="text" name="image_url" id="image_url"
                           class="mt-1 border border-gray-200 w-full bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>

                <div class="mb-6 w-2/4 h-fit hidden">
                    <label for="image_from_files" class="text-sm font-medium text-gray-900">Image</label>
                    <div class="mt-1 flex justify-center items-center w-full">
                        <label for="dropzone-file"
                               class="overflow-y-auto scrollbar flex flex-col justify-center items-center w-full h-44 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <svg id="uploadSvg" aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <img id="preview" class="w-20" src="" alt="">
                                <p class="mb-1 font-semibold text-sm text-gray-500 text-center">
                                    Click to upload
                                    <span class="font-normal lg:flex hidden">or drag and drop</span></p>
                                <p class="text-xs text-gray-500 md:block hidden">PNG, JPG or JPEG (MAX. 200Kb)</p>
                            </div>
                            <input name="image" id="dropzone-file" type="file" class="hidden"/>
                        </label>
                    </div>
                </div>
            {{--End mage options--}}

            <div class="flex w-full justify-center">
                <button type="submit"
                        class="w-2/4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 mb-10 focus:outline-none">
                    Add to wardrobe
                </button>
            </div>
        </div>
    </form>

</x-app-layout>
