<x-app-layout>
    <div
        class="md:overflow-hidden overflow-y-auto bg-white shadow-sm rounded-md sm:rounded-lg flex md:flex-row flex-col md:justify-center items-center h-4/5 w-11/12">
        @if(!$clothes->isEmpty())
            <div id="outfit"
                 class="flex justify-center items-center p-6 border-b border-gray-200 lg:w-2/4 w-full h-full">
                <div class="flex flex-col items-center justify-center">
                    {{-- Hat --}}
                    <p id="randomize"
                       class="flex justify-center items-center text-sm text-blue-500 cursor-pointer mx-2">Randomize<i
                            class="stroke-indigo-500 w-4 mx-1" data-feather="shuffle"></i></p>
                    <div class="relative group">
                        <img id="hats" class="lg:h-36 w-24 h-24 bg-white my-1 object-scale-down"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                        <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-xs text-blue-500 cursor-default">
                            Click to remove</p>
                    </div>
                    <div class="flex flex-row my-1">
                        <div class="bg-center lg:h-36 w-24 h-24 bg-white mx-1 text-gray-300">Accessory 1</div>
                        {{-- Top --}}
                        <div class="relative group">
                            <img id="tops" class="lg:h-36 w-24 h-24 bg-white my-1 object-cover"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                            <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-sm text-blue-500 cursor-default">
                                Click to remove</p>
                        </div>
                        <div class="lg:h-36 w-24 h-24 bg-white mx-1 text-gray-300">Accessory 2</div>
                    </div>
                    {{-- Bottom --}}
                    <div class="relative group">
                        <img id="bottoms" class="lg:h-36 w-24 h-24 bg-white my-1 object-cover"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                        <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-xs text-blue-500 cursor-default">
                            Click to remove</p>
                    </div>
                    {{-- Shoes --}}
                    <div class="relative group">
                        <img id="shoes" class="lg:h-36 w-24 h-24 bg-white my-1 object-cover"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAA1BMVEX///+nxBvIAAAAR0lEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBgxUwAAU+n3sIAAAAASUVORK5CYII="/>
                        <p class="opacity-0 absolute inset-0 z-10 flex justify-center items-center text-center text-sm text-blue-500 cursor-default">
                            Click to remove</p>
                    </div>
                    <div id="actions" class="relative group mt-4 opacity-0">
                        <button class="bg-blue-500 text-white text-sm rounded-md py-2 mx-1 px-4 hover:bg-blue-400">Save</button>
                        <button class="bg-gray-100 text-blue-500 text-sm rounded-md py-2 mx-1 px-4">Clear</button>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-full h-full md:overflow-y-auto md:scrollbar">
                <div id="header" class="flex items-center justify-between m-6">
                    <p class="text-xl font-bold text-black">Wardrobe</p>
                    <a href="{{ route('outfit.create') }}"
                       class="bg-blue-500 text-white text-sm rounded-md py-2 px-4 hover:bg-blue-400">Add new</a>
                </div>
                <div class="accordion accordion-flush" id="accordion">
                    @foreach($clothes as $category => $clothing)
                        <div class="accordion accordion-flush" id="{{ $category . 'Accordion' }}">
                            <div
                                id="{{ $category }}" class="accordion-item rounded-none">
                                <h2 class="accordion-header mb-0" id="{{ 'flush-heading' . ucfirst($category) }}">
                                    <button
                                        class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left border-0 rounded-none transition focus:outline-none"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="{{ '#flush-' . $category . 'Collapse' }}"
                                        aria-expanded="false" aria-controls="{{ 'flush-' . $category . 'Collapse' }}">
                                        {{ ucfirst($category) }}
                                    </button>
                                </h2>
                                <div id="{{ 'flush-' . $category . 'Collapse' }}"
                                     class="accordion-collapse border-0 collapse show"
                                     aria-labelledby="{{ 'flush-heading' . ucfirst($category) }}"
                                     data-bs-parent="{{ '#accordion' . ucfirst($category) }}">
                                    <div class="accordion-body py-4 px-5 flex flew-row flex-wrap">
                                        @foreach($clothing as $item)
                                            <img
                                                src="{{ $item->getFirstMediaUrl('outfits') }}"
                                                class="my-2 mx-2 p-1 bg-white border rounded lg:h-44 h-32"
                                                alt="..."
                                            />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <div class="flex flex-col flex-wrap justify-center items-center h-3/4">
                        <svg width="276" height="264" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#a)">
                                <ellipse cx="132.607" cy="217.338" rx="110.607" ry="21.337" fill="#1F88F8"
                                         fill-opacity=".35"/>
                            </g>
                            <path
                                d="M136.701 243.402c63.348 0 114.701-51.353 114.701-114.701C251.402 65.353 200.049 14 136.701 14 73.353 14 22 65.353 22 128.701c0 63.348 51.353 114.701 114.701 114.701Z"
                                fill="url(#b)"/>
                            <path d="M225.432 60.366H79.742v71.896h145.69V60.366Z" fill="url(#c)"/>
                            <path d="M225.433 60.366h14.623a35.944 35.944 0 0 1 0 71.888h-14.623V60.366Z"
                                  fill="url(#d)"/>
                            <path
                                d="M234.891 70.942h8.365A24.258 24.258 0 0 1 267.515 95.2v2.227a24.257 24.257 0 0 1-24.259 24.26h-8.365V70.941Z"
                                fill="url(#e)"/>
                            <path d="M225.432 72.432H91.978v59.83h133.454v-59.83Z" fill="url(#f)"/>
                            <path fill="url(#g)" d="M44.934 144.231h54.107v69.295H44.934z"/>
                            <path fill="url(#h)" d="M111.382 144.231h54.107v69.295h-54.107z"/>
                            <path fill="url(#i)" d="M177.83 144.231h35.122v69.295H177.83z"/>
                            <path d="M225.433 60.366h-12.439v71.896h12.439V60.366Z" fill="url(#j)"/>
                            <path d="M111.382 131.891h-12.34v93.976h12.34v-93.976Z" fill="url(#k)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M37.34 131.891h8.123v93.976H37.34a4.746 4.746 0 0 1-4.746-4.746v-84.484a4.746 4.746 0 0 1 4.746-4.746Zm133.845 12.34v-12.34H45.463v12.34h125.722Zm0 81.636v-12.34H45.463v12.34h125.722Z"
                                  fill="url(#l)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M177.829 131.891h-7.593a4.746 4.746 0 0 0-4.747 4.746v89.23H220.546a4.746 4.746 0 0 0 4.746-4.746v-89.23H177.829Zm35.123 12.34H177.83v69.296h35.122v-69.296Z"
                                  fill="url(#m)"/>
                            <path
                                d="M89.506 132.415v35.563h33.996a.95.95 0 0 0 .949-.949v-33.665a.95.95 0 0 0-.95-.949H89.506Z"
                                fill="url(#n)"/>
                            <path
                                d="M87.45 132.415a.95.95 0 0 0-.95.949v33.665a.95.95 0 0 0 .95.949h33.995v-35.563H87.449Z"
                                fill="url(#o)"/>
                            <path
                                d="M115.617 135.819H92.335c-1.048 0-1.898.85-1.898 1.898v24.67c0 1.049.85 1.899 1.898 1.899h23.282c1.049 0 1.899-.85 1.899-1.899v-24.67c0-1.048-.85-1.898-1.899-1.898Z"
                                fill="url(#p)"/>
                            <g filter="url(#q)">
                                <path
                                    d="m25 108.347 13.141 32.32a3.63 3.63 0 0 0 4.742 1.999l29.45-11.965a3.647 3.647 0 0 0 2.006-4.75L59.15 88.593a3.642 3.642 0 0 0-4.742-1.998l-24.47 9.949L25 108.347Z"
                                    fill="url(#r)"/>
                            </g>
                            <g filter="url(#s)">
                                <path
                                    d="m233.132 89.362-13.142 32.32a3.616 3.616 0 0 1-1.956 1.984 3.65 3.65 0 0 1-1.391.285 3.657 3.657 0 0 1-1.394-.27l-29.45-11.965a3.647 3.647 0 0 1-2.007-4.75l15.191-37.358a3.64 3.64 0 0 1 4.742-1.999l24.47 9.95 4.937 11.803Z"
                                    fill="url(#t)"/>
                            </g>
                            <path d="m25 108.347 8.357-3.395-3.412-8.408L25 108.347Z" fill="url(#u)"/>
                            <path d="m233.132 89.362-8.357-3.395 3.412-8.408 4.945 11.803Z" fill="url(#v)"/>
                            <path d="M107.541 151.246a6.2 6.2 0 1 0-7.129 0l-2.66 9.153h12.44l-2.651-9.153Z"
                                  fill="url(#w)"/>
                            <path
                                d="M184.154 55.192c0 1.332-.2 2.657-.592 3.93a13.146 13.146 0 0 1-3.277 5.401c-.445.45-.923.867-1.431 1.245-.334.26-.685.498-1.05.711-.364.224-.74.427-1.126.61-.576.284-1.173.522-1.787.711a13.327 13.327 0 0 1-3.929.593h-2.455v63.632H99.921V53.812A11.853 11.853 0 0 1 111.733 42h59.195a12.998 12.998 0 0 1 6.063 1.473c.203.102.398.212.593.33.16.089.315.185.465.289a12.69 12.69 0 0 1 2.21 1.77c.898.899 1.662 1.922 2.27 3.039.41.752.745 1.544.999 2.362l.178.636c.109.424.197.853.262 1.286.114.664.176 1.334.186 2.007Z"
                                fill="url(#x)"/>
                            <path
                                d="M184.155 55.192a13.348 13.348 0 0 1-.593 3.929 13.95 13.95 0 0 1-.999 2.362 13.609 13.609 0 0 1-2.278 3.04c-.445.45-.923.867-1.431 1.245-.339.254-.686.483-1.05.711-.364.224-.74.427-1.126.61-.577.28-1.175.518-1.787.711a13.322 13.322 0 0 1-3.929.593h-2.455V53.812a11.85 11.85 0 0 1 7.273-10.906c.424.17.847.356 1.245.567.203.102.398.212.593.33.16.088.315.184.465.288a12.69 12.69 0 0 1 2.21 1.77c.898.9 1.662 1.923 2.27 3.04.407.754.741 1.545.999 2.362l.178.635c.11.424.198.854.262 1.287.103.664.154 1.335.153 2.007Z"
                                fill="url(#y)"/>
                            <path
                                d="M154.815 108.858h-43.311c-.725 0-1.313.586-1.313 1.309a1.31 1.31 0 0 0 1.313 1.308h43.311a1.31 1.31 0 0 0 1.312-1.308 1.31 1.31 0 0 0-1.312-1.309ZM154.815 95.438h-43.311a1.31 1.31 0 0 0-1.313 1.308 1.31 1.31 0 0 0 1.313 1.308h43.311a1.31 1.31 0 0 0 1.312-1.308 1.31 1.31 0 0 0-1.312-1.308ZM154.814 82.008h-27.891a1.31 1.31 0 0 0-1.313 1.309 1.31 1.31 0 0 0 1.313 1.308h27.891a1.31 1.31 0 0 0 1.313-1.308 1.31 1.31 0 0 0-1.313-1.309ZM136.517 68.58h-25.318c-.556 0-1.008.45-1.008 1.007v.6c0 .557.452 1.008 1.008 1.008h25.318c.556 0 1.007-.45 1.007-1.007v-.601c0-.557-.451-1.008-1.007-1.008ZM120.818 82.008h-9.314a1.31 1.31 0 0 0-1.313 1.309 1.31 1.31 0 0 0 1.313 1.308h9.314a1.31 1.31 0 0 0 1.312-1.308 1.31 1.31 0 0 0-1.312-1.309Z"
                                fill="#A5C4F1"/>
                            <path d="M45.409 144.231h4.271v69.296H45.41v-69.296Z" fill="url(#z)"/>
                            <path d="M111.382 167.962h3.797v45.564h-3.797v-45.564Z" fill="url(#A)"/>
                            <path d="M177.83 144.231h4.272v69.296h-4.272v-69.296Z" fill="url(#B)"/>
                            <g filter="url(#C)">
                                <ellipse cx="61.579" cy="85.757" rx="36.579" ry="11.757" fill="#FF4C77"
                                         fill-opacity=".3"/>
                            </g>
                            <path
                                d="M27.278 68.624A31.462 31.462 0 0 0 75.66 90.791l12.123 4.12a2.016 2.016 0 0 0 2.497-2.675L85.42 80.639a31.452 31.452 0 1 0-58.141-12.015Z"
                                fill="url(#D)"/>
                            <path
                                d="M57.629 80.545c3.415 0 5.848-2.34 5.848-5.614 0-3.275-2.433-5.615-5.848-5.615-3.37 0-5.849 2.34-5.849 5.615 0 3.275 2.48 5.614 5.849 5.614Zm4.678-12.164c0-3.088 1.778-4.211 4.21-5.334 3.229-1.497 5.615-4.538 5.615-8.28 0-5.896-5.801-10.013-13.661-10.013-8.422 0-14.364 4.725-14.878 11.322l10.76 1.965c.281-2.573 1.638-4.398 3.556-4.398 1.45 0 2.527.983 2.527 2.34 0 1.59-1.591 2.573-2.854 3.321-3.369 2.2-4.632 4.632-4.632 9.077h9.357Z"
                                fill="#fff"/>
                            <path d="M214.886 46.096a4.79 4.79 0 1 1-9.58.001 4.79 4.79 0 0 1 9.58 0Z" stroke="url(#E)"
                                  stroke-width="2.613"/>
                            <circle cx="182.096" cy="237.096" r="4.79" stroke="url(#F)" stroke-width="2.613"/>
                            <path
                                d="M21.031 175.236c1.324-.212 2.381 1.089 1.903 2.341l-3.23 8.456c-.478 1.252-2.133 1.517-2.978.477l-5.708-7.024c-.846-1.041-.248-2.607 1.076-2.819l8.937-1.431Z"
                                fill="url(#G)"/>
                            <path
                                d="M241.978 168.006c-.331-1.299.868-2.47 2.159-2.107l8.714 2.449c1.29.362 1.704 1.987.745 2.923l-6.477 6.322c-.96.936-2.573.483-2.905-.816l-2.236-8.771Z"
                                fill="url(#H)"/>
                            <path
                                d="M125.87 8.417c.515-2.133 3.549-2.133 4.064 0l1.733 7.179a2.09 2.09 0 0 0 1.541 1.541l7.179 1.733c2.133.515 2.133 3.549 0 4.064l-7.179 1.733a2.09 2.09 0 0 0-1.541 1.541l-1.733 7.179c-.515 2.133-3.549 2.133-4.064 0l-1.733-7.179a2.09 2.09 0 0 0-1.541-1.541l-7.179-1.733c-2.133-.515-2.133-3.549 0-4.064l7.179-1.733a2.09 2.09 0 0 0 1.541-1.541l1.733-7.179Z"
                                fill="url(#I)"/>
                            <path
                                d="M72.87 230.417c.515-2.133 3.549-2.133 4.064 0l1.733 7.179a2.09 2.09 0 0 0 1.541 1.541l7.179 1.733c2.133.515 2.133 3.549 0 4.064l-7.179 1.733a2.09 2.09 0 0 0-1.541 1.541l-1.733 7.179c-.515 2.133-3.549 2.133-4.064 0l-1.733-7.179a2.09 2.09 0 0 0-1.541-1.541l-7.179-1.733c-2.133-.515-2.133-3.549 0-4.064l7.179-1.733a2.09 2.09 0 0 0 1.541-1.541l1.733-7.179Z"
                                fill="url(#J)"/>
                            <defs>
                                <linearGradient id="b" x1="135.817" y1="-23.349" x2="138.167" y2="379.463"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#CAE0FF" stop-opacity="0"/>
                                    <stop offset="1" stop-color="#BCD8FF"/>
                                </linearGradient>
                                <linearGradient id="c" x1="152.588" y1="60.366" x2="152.588" y2="132.262"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#ABCCFF"/>
                                    <stop offset="1" stop-color="#70A8FF"/>
                                </linearGradient>
                                <linearGradient id="d" x1="250.716" y1="60.366" x2="250.716" y2="132.254"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <linearGradient id="e" x1="272.28" y1="123.348" x2="240.005" y2="80.631"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="f" x1="158.705" y1="72.432" x2="158.705" y2="132.262"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2A64BE"/>
                                    <stop offset="1" stop-color="#6095E7"/>
                                </linearGradient>
                                <linearGradient id="g" x1="113.755" y1="239.156" x2="47.307" y2="176.506"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="h" x1="168.337" y1="219.697" x2="101.889" y2="192.168"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="i" x1="227.191" y1="221.121" x2="165.49" y2="162.742"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="j" x1="219.213" y1="60.366" x2="219.213" y2="132.262"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#ABCCFF"/>
                                    <stop offset="1" stop-color="#70A8FF"/>
                                </linearGradient>
                                <linearGradient id="k" x1="83.853" y1="160.843" x2="75.31" y2="243.903"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#ABCCFF"/>
                                    <stop offset="1" stop-color="#70A8FF"/>
                                </linearGradient>
                                <linearGradient id="l" x1="30.221" y1="148.503" x2="165.964" y2="211.154"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#ABCCFF"/>
                                    <stop offset="1" stop-color="#70A8FF"/>
                                </linearGradient>
                                <linearGradient id="m" x1="272.28" y1="190.27" x2="187.322" y2="193.118"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <linearGradient id="n" x1="106.978" y1="132.415" x2="106.978" y2="167.978"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <linearGradient id="o" x1="103.972" y1="132.415" x2="103.972" y2="167.978"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#ABCCFF"/>
                                    <stop offset="1" stop-color="#70A8FF"/>
                                </linearGradient>
                                <linearGradient id="p" x1="103.976" y1="135.819" x2="103.976" y2="164.286"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <linearGradient id="r" x1="69.223" y1="111.521" x2="35.823" y2="108.186"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#C6DDFF"/>
                                    <stop offset="1" stop-color="#fff"/>
                                </linearGradient>
                                <linearGradient id="t" x1="188.909" y1="92.535" x2="222.309" y2="89.201"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#C6DDFF"/>
                                    <stop offset="1" stop-color="#fff"/>
                                </linearGradient>
                                <linearGradient id="u" x1="29.179" y1="96.544" x2="29.179" y2="108.347"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="v" x1="228.953" y1="77.559" x2="228.953" y2="89.362"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="w" x1="100.94" y1="154.673" x2="113.28" y2="155.147"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2A64BE"/>
                                    <stop offset="1" stop-color="#4B80D1"/>
                                </linearGradient>
                                <linearGradient id="x" x1="142.038" y1="42" x2="142.038" y2="132.025"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="y" x1="178.304" y1="64.969" x2="159.794" y2="50.73"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EDF4FF"/>
                                    <stop offset="1" stop-color="#ABCCFF"/>
                                </linearGradient>
                                <linearGradient id="z" x1="15.507" y1="210.204" x2="105.362" y2="200.11"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset=".094" stop-color="#2A64BE"/>
                                    <stop offset="1" stop-color="#2A64BE" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="A" x1="84.803" y1="211.342" x2="163.859" y2="199.336"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset=".094" stop-color="#2A64BE"/>
                                    <stop offset="1" stop-color="#2A64BE" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="B" x1="147.929" y1="210.204" x2="221.57" y2="216.666"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset=".094" stop-color="#265FB8"/>
                                    <stop offset="1" stop-color="#84B4FF"/>
                                </linearGradient>
                                <linearGradient id="D" x1="27.303" y1="37.233" x2="89.979" y2="96.636"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF698D"/>
                                    <stop offset="1" stop-color="#FF3868"/>
                                </linearGradient>
                                <linearGradient id="E" x1="202.603" y1="42.286" x2="221.654" y2="58.797"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#94BFFF"/>
                                    <stop offset="1" stop-color="#4C94FE"/>
                                </linearGradient>
                                <linearGradient id="F" x1="174.603" y1="233.286" x2="193.654" y2="249.797"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#94BFFF"/>
                                    <stop offset="1" stop-color="#4C94FE"/>
                                </linearGradient>
                                <linearGradient id="G" x1="24.01" y1="174.759" x2="10.492" y2="185.744"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <linearGradient id="H" x1="241.233" y1="165.083" x2="253.399" y2="177.548"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <linearGradient id="I" x1="127.902" y1="0" x2="127.902" y2="41.804"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <linearGradient id="J" x1="74.902" y1="222" x2="74.902" y2="263.804"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#70A8FF"/>
                                    <stop offset="1" stop-color="#5597FD"/>
                                </linearGradient>
                                <filter id="a" x=".227" y="174.227" width="264.76" height="86.221"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                    <feGaussianBlur stdDeviation="10.886" result="effect1_foregroundBlur_5_990"/>
                                </filter>
                                <filter id="q" x="22.152" y="86.327" width="68.591" height="76.543"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                   result="hardAlpha"/>
                                    <feOffset dx="6.645" dy="10.442"/>
                                    <feGaussianBlur stdDeviation="4.746"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix
                                        values="0 0 0 0 0.184314 0 0 0 0 0.254902 0 0 0 0 0.443137 0 0 0 0.15 0"/>
                                    <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_5_990"/>
                                    <feBlend in="SourceGraphic" in2="effect1_dropShadow_5_990" result="shape"/>
                                </filter>
                                <filter id="s" x="180.678" y="67.342" width="68.591" height="76.543"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                   result="hardAlpha"/>
                                    <feOffset dx="6.645" dy="10.442"/>
                                    <feGaussianBlur stdDeviation="4.746"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix
                                        values="0 0 0 0 0.184314 0 0 0 0 0.254902 0 0 0 0 0.443137 0 0 0 0.15 0"/>
                                    <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_5_990"/>
                                    <feBlend in="SourceGraphic" in2="effect1_dropShadow_5_990" result="shape"/>
                                </filter>
                                <filter id="C" x="3.227" y="52.227" width="116.703" height="67.061"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                    <feGaussianBlur stdDeviation="10.886" result="effect1_foregroundBlur_5_990"/>
                                </filter>
                            </defs>
                        </svg>
                        <div class="flex flex-col items-center mt-6">
                            <p class="font-medium text-center text-xl">You have no items yet.</p>
                            <a href="{{ route('outfit.create') }}"
                               class="bg-blue-500 text-white text-sm rounded-md py-2 px-4 hover:bg-blue-400 mt-4">Start
                                creating wardrobe</a>
                        </div>
                    </div>
                @endif
            </div>
</x-app-layout>
