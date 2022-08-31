<x-guest-layout>
    <div class="w-full px-6 pb-6 antialiased bg-white">
        <div class="mx-auto max-w-7xl h-screen">
            <nav class="relative z-50 h-24 select-none">
                <div class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-between sm:px-4 md:px-2 lg:px-0">
                    <div class="flex items-center justify-start w-1/4 h-full pr-4">
                        <a href="{{ route('welcome') }}" class="inline-block py-4 md:py-0">
                            <span class="p-1 text-xl text-blue-500 font-bold">{{ config('app.name') }}</span>
                        </a>
                    </div>
                    <div class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                        <a href="{{ route('login') }}" class="w-full px-3 py-2 mr-0 text-gray-700 md:mr-2 lg:mr-3 md:w-auto">Sign In</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 text-sm font-medium leading-4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">Sign Up</a>
                    </div>
                </div>
            </nav>

            <div class="h-full flex flex-col max-w-lg px-4 mx-auto mt-px text-left md:max-w-none md:text-center justify-center items-center">
                <h1 class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl"><span class="inline md:block lg:mb-2">Easily Plan Your</span> <span class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-blue-600 to-blue-500 md:inline-block justify-center lg:inline lg:mt-2">Next Drippy Outfit</span></h1>
                <div class="mx-auto mt-5 text-gray-500 md:mt-12 md:max-w-lg md:text-center lg:text-lg">Avoid the mess in your wardrobe and easily create a drippy outfit, lightning fast.</div>
                <div class="flex flex-col items-center mt-12 text-center">
                <span class="relative inline-flex w-full md:w-auto">
                    <a href="{{ route('index') }}" type="button" class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold leading-6 text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">Get Started</a>
                    <span class="flex absolute top-0 right-0 px-2 py-1 -mt-3 -mr-6 text-xs font-medium leading-tight text-white bg-green-400 rounded-full">It's free
                        <img class="ml-1 w-4" src="{{ asset('images/shushing-face.png') }}" alt="Shushing Face Emoji"></span>
                </span>
                    <p class="mt-3 text-sm text-blue-500">Scroll down to learn more</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full bg-white pt-5 pb-5">
        <div class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

            <div class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                <img src="{{ asset('images/illustration-1.svg') }}" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20">
            </div>
            <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    Upload Clothes</h2>
                <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Upload your clothes and have access to them anytime, anywhere you go.</p>
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Upload from your device files or via URL
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Add items before buying and match outfits
                    </li>
                </ul>
            </div>
        </div>

        <div class="box-border flex flex-col items-center content-center px-8 mx-auto mt-2 leading-6 text-black border-0 border-gray-300 border-solid md:mt-20 xl:mt-0 md:flex-row max-w-7xl lg:px-16">
            <div class="box-border w-full text-black border-solid md:w-1/2 md:pl-6 xl:pl-32">
                <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    Save Outfits
                </h2>
                <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                    Save selected outfits and share it with friends to get their opinion.
                </p>
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Share your drippy outfits with friends
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Edit or Delete outfits based on new opinion
                    </li>
                </ul>
            </div>

            <div class="box-border relative w-full max-w-md px-4 mt-10 mb-4 text-center bg-no-repeat bg-contain border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2">
                <img src="{{ asset('images/illustration-2.svg') }}" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20">
            </div>
        </div>

        <div class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

            <div class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                <img src="{{ asset('images/illustration-4.svg') }}" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20">
            </div>
            <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    Filter Clothes</h2>
                <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Filter out only clothes you're feeling right now to make choosing easier.</p>
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Filter using seasons you can wear them on
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Filter using tags you attached to them
                    </li>
                </ul>
            </div>
        </div>


        <div class="box-border flex flex-col items-center content-center px-8 mx-auto mt-2 leading-6 text-black border-0 border-gray-300 border-solid md:mt-20 xl:mt-0 md:flex-row max-w-7xl lg:px-16"
        <div class="box-border w-full text-black border-solid md:w-1/2 md:pl-6 xl:pl-32">
            <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                Feeling goofy?
            </h2>
            <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                We can randomize some fine outfits for you with filters you provide.
            </p>
            <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> One simple click
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white rounded-full bg-blue-500" data-primary="yellow-400"><span class="text-sm font-bold">✓</span></span> Filter out only clothes you want
                </li>
            </ul>
        </div>

        <div class="box-border relative w-full max-w-md px-4 mt-10 mb-4 text-center bg-no-repeat bg-contain border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2">
            <img src="{{ asset('images/illustration-3.svg') }}" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20">
        </div>
    </div>
    </div>

    <div class="w-full my-32 px-8 py-16 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                    <h2 class="text-2xl font-bold leading-none text-black sm:text-3xl md:text-5xl">
                        Start using <span class="text-blue-500">{{ config('app.name') }}</span> today
                    </h2>
                    <p class="text-xl text-gray-600 md:pr-16">Easiest way to create and plan your outfits anytime you want, anywhere you are. Who says no?</p>
                </div>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-md px-7" data-rounded="rounded-lg" data-rounded-max="rounded-full">
                        <h3 class="mb-6 text-2xl font-medium text-center">Join us</h3>
                        <x-register-component/>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="text-gray-700 bg-white body-font border border-t-2">
        <div class="container flex flex-col justify-center items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">
            <p class="text-sm font-bold leading-none text-blue-500 select-none logo">{{ config('app.name') }}</p>
            <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0">© 2022 Peacedrobe - All rights reserved.</p>
        </div>
    </div>
</x-guest-layout>
