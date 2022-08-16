<x-app-layout>
    <div
          class="bg-white shadow-sm rounded-md h-4/5 w-11/12 overflow-y-auto scrollbar"
          onkeydown="return event.key !== 'Enter';">
        <div class="relative h-full w-full flex flex-col justify-center items-center my-1">
            <form action="{{ route('clothes.update', $clothing->id) }}" method="POST" enctype="multipart/form-data" id="edit"
                  class="w-full flex flex-col justify-center items-center">
                @method('PUT')
                @csrf
                <div class="my-6 w-2/4 h-auto">
                    <label for="tags" class="text-sm font-medium text-gray-900">Category</label>
                    <select name="category" id="categories"
                            class="mt-1 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>Choose a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($clothing->category->name == $category->name) selected @endif>{{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6 w-2/4 h-auto">
                    <label for="tags" class="text-sm font-medium text-gray-900">Tags</label>
                    <input type="text" name="tags" id="tags"
                           class="mt-1 border border-gray-200 w-full bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                           value="{{ implode(', ', $clothing->tags()->pluck('name')->toArray()) }}">
                    <p class="text-sm text-gray-500">Separate tags with commas e.g - Comfortable, Traditional, etc.</p>
                </div>

                <div class="mb-6 w-2/4 h-fit">
                    <label for="season" class="text-sm font-medium text-gray-900">Season</label>
                    <ul class="mt-1 items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex">
                        @foreach($seasons as $season)
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center pl-3">
                                    <input name="season[]" id="{{ $season->name }}" type="checkbox" value="{{ $season->id }}"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300"
                                           @if($clothing->seasons->contains($season->id)) checked @endif>
                                    <label for="{{ $season->name }}"
                                           class="py-3 ml-2 w-full text-sm font-medium text-gray-900">{{ ucfirst($season->name) }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-6 w-2/4 h-fit">
                    <label for="image" class="text-sm font-medium text-gray-900">Image</label>
                    <div class="mt-1 flex justify-center items-center w-full">
                        <label for="dropzone-file"
                               class="flex flex-col justify-center items-center w-full h-44 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <img id="preview" class="w-20" src="{{ $clothing->getFirstMediaUrl('outfits') }}" alt="">
                                <p class="mb-1 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 200Kb)</p>
                            </div>
                            <input name="image" id="dropzone-file" type="file" class="hidden"/>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-2/4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                    Save
                </button>
            </form>
            <form action="{{ route('clothes.destroy', $clothing->id) }}" method="POST"
                  class="w-full flex flex-col justify-center items-center mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-2/4 text-white bg-red-500 hover:bg-red-600 focus:ring-2 focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                    Delete
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
