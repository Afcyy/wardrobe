<x-app-layout>
    <div class="w-screen">
        <div class="flex justify-center items-center mx-auto sm:px-6 lg:px-8 h-screen">
            <div class="md:overflow-hidden overflow-y-auto bg-white shadow-sm rounded-md sm:rounded-lg flex md:flex-row flex-col md:justify-center items-center h-4/5 w-11/12">
                <div id="outfit" class="flex justify-center items-center p-6 border-b border-gray-200 lg:w-2/4 w-full h-full">
                    <div class="flex flex-col items-center justify-center">
                        {{-- Hat --}}
                        <p id="randomize" class="flex justify-center items-center text-sm text-blue-500 cursor-pointer mx-2">Randomize <i class="stroke-indigo-500 w-4 mx-1" data-feather="shuffle"></i></p>
                        <div class="relative group">
                            <img id="hats" class="lg:h-36 w-24 h-24 bg-white my-1 object-scale-down"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                            <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-sm text-blue-500 cursor-default">Click to remove</p>
                        </div>
                        <div class="flex flex-row my-1">
                            <div class="bg-center lg:h-36 w-24 h-24 bg-white mx-1 text-gray-300">Accessory 1</div>
                            {{-- Top --}}
                            <div class="relative group">
                                <img id="tops" class="lg:h-36 w-24 h-24 bg-white my-1 object-cover"
                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                                <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-sm text-blue-500 cursor-default">Click to remove</p>
                            </div>
                            <div class="lg:h-36 w-24 h-24 bg-white mx-1 text-gray-300">Accessory 2</div>
                        </div>
                        {{-- Bottom --}}
                        <div class="relative group">
                            <img id="bottoms" class="lg:h-36 w-24 h-24 bg-white my-1 object-cover"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                            <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-sm text-blue-500 cursor-default">Click to remove</p>
                        </div>
                        {{-- Shoes --}}
                        <div class="relative group">
                            <img id="shoes" class="lg:h-36 w-24 h-24 bg-white my-1 object-cover"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                            <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-sm text-blue-500 cursor-default">Click to remove</p>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-full h-full md:overflow-y-auto md:scrollbar">
                    <div class="accordion accordion-flush" id="accordion">
                        <div class="accordion accordion-flush" id="hatsAccordion">
                            <div class="flex items-center justify-between m-6">
                                <p class="text-xl font-bold text-black">Wardrobe</p>
                                <a href="{{ route('upload') }}" class="bg-blue-500 text-white text-sm rounded-md py-2 px-4">Add new</a>
                            </div>
                            <div
                                id="hats" class="accordion-item rounded-none">
                                <h2 class="accordion-header mb-0" id="flush-headingTops">
                                    <button
                                        class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left border-0 rounded-none transition focus:outline-none"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-hatsCollapse"
                                        aria-expanded="false" aria-controls="flush-hatsCollapse">
                                        Hats
                                    </button>
                                </h2>
                                <div id="flush-hatsCollapse" class="accordion-collapse border-0 collapse show"
                                     aria-labelledby="flush-headingHats" data-bs-parent="#accordionHats">
                                    <div class="accordion-body py-4 px-5 flex flew-row flex-wrap">
                                        <img
                                            src="https://static.zara.net/photos///2022/V/0/1/p/0653/062/052/2/w/1920/0653062052_6_1_1.jpg?ts=1648801496086"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />

                                        <img
                                            src="https://static.zara.net/photos///2022/V/0/1/p/3920/025/800/2/w/1920/3920025800_6_1_1.jpg?ts=1641284562987"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-flush" id="topsAccordion">
                            <div
                                id="tops" class="accordion-item rounded-none">
                                <h2 class="accordion-header mb-0" id="flush-headingTops">
                                    <button
                                        class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left border-0 rounded-none transition focus:outline-none"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-topsCollapse"
                                        aria-expanded="false" aria-controls="flush-topsCollapse">
                                        Tops
                                    </button>
                                </h2>
                                <div id="flush-topsCollapse" class="accordion-collapse border-0 collapse show"
                                     aria-labelledby="flush-headingTops" data-bs-parent="#accordionTops">
                                    <div class="accordion-body py-4 px-5 flex flew-row flex-wrap">
                                        <img
                                            src="https://static.zara.net/photos///2021/I/0/2/p/6462/300/833/2/w/1920/6462300833_6_1_1.jpg?ts=1621523653208"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />

                                        <img
                                            src="https://static.zara.net/photos///2021/I/0/2/p/0526/310/811/2/w/196/0526310811_6_1_1.jpg?ts=1623248590699"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-flush" id="bottomsAccordion">
                            <div
                                id="bottoms" class="accordion-item rounded-none">
                                <h2 class="accordion-header mb-0" id="flush-headingTops">
                                    <button
                                        class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left border-0 rounded-none transition focus:outline-none"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-bottomsCollapse"
                                        aria-expanded="false" aria-controls="flush-bottomsCollapse">
                                        Bottoms
                                    </button>
                                </h2>
                                <div id="flush-bottomsCollapse" class="accordion-collapse border-0 collapse show"
                                     aria-labelledby="flush-headingTops" data-bs-parent="#accordionTops">
                                    <div class="accordion-body py-4 px-5 flex flew-row flex-wrap">
                                        <img
                                            src="https://static.zara.net/photos///2022/V/0/1/p/6045/232/407/2/w/438/6045232407_6_1_1.jpg?ts=1641923321517"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />

                                        <img
                                            src="https://static.zara.net/photos///2022/V/0/1/p/6164/063/406/2/w/1920/6164063406_6_1_1.jpg?ts=1642684506925"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />

                                        <img
                                            src="https://static.zara.net/photos///2022/V/0/1/p/4365/264/441/2/w/1920/4365264441_6_1_1.jpg?ts=1649072196848"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-flush" id="shoesAccordion">
                            <div
                                id="shoes" class="accordion-item rounded-none">
                                <h2 class="accordion-header mb-0" id="flush-headingShoes">
                                    <button
                                        class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left border-0 rounded-none transition focus:outline-none"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-shoesCollapse"
                                        aria-expanded="false" aria-controls="flush-shoesCollapse">
                                        Shoes
                                    </button>
                                </h2>
                                <div id="flush-shoesCollapse" class="accordion-collapse border-0 collapse show"
                                     aria-labelledby="flush-headingShoes" data-bs-parent="#accordionShoes">
                                    <div class="accordion-body py-4 px-5 flex flew-row flex-wrap">
                                        <img
                                            src="https://static.zara.net/photos///2022/I/1/2/p/2265/920/001/2/w/297/2265920001_6_1_1.jpg?ts=1658144340803"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />

                                        <img
                                            src="https://static.zara.net/photos///2022/I/1/2/p/2266/920/009/2/w/297/2266920009_6_1_1.jpg?ts=1658144340693"
                                            class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                            alt="..."
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
