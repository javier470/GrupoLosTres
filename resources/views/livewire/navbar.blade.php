<header class="w-full pt-6 pb-6 custom-shadow-nav">
    <nav class="flex flex-col md:flex-row justify-between items-center px-6 md:px-[100px] gap-4 md:gap-0">
        <section class="w-full md:w-auto flex justify-center md:justify-start">
            <img wire:click="redirectHome" src="{{ Vite::asset('resources/img/logo.webp') }}" alt="Logo" class="w-28 md:w-32 cursor-pointer">
        </section>

        <section class="w-full md:w-auto flex flex-col md:flex-row items-center gap-4">
            @if(!request()->routeIs('procesar'))
            <div class="w-full md:w-auto flex justify-center md:justify-start">
                <button wire:click="redirectToPage"
                    class="w-full md:w-auto border border-[#1ea5dc] text-[#1ea5dc] rounded-xl py-1 px-6 font-medium cursor-pointer transition duration-500 ease-in-out hover:bg-[#1ea5dc] hover:text-white">
                    Visitar sitio web
                </button>
            </div>
            @endif

            <div class="flex gap-3 items-center">
                <img src="{{ Vite::asset('resources/img/headphones.png') }}" alt="headphones" class="w-6 md:w-7">
                <div class="flex gap-1 text-[#5f738c] text-sm md:text-base">
                    <p class="font-bold">PBX:</p>
                    <p>2301-0000</p>
                </div>
            </div>

            @if(request()->routeIs('procesar'))
            <div class="w-full md:w-auto flex justify-center md:justify-start">
                <button wire:click="redirectCleanHome"
                    class="w-full md:w-auto border border-[#1ea5dc] text-[#1ea5dc] rounded-xl py-1 px-6 font-medium cursor-pointer transition duration-500 ease-in-out hover:bg-[#1ea5dc] hover:text-white">
                    Salir
                </button>
            </div>
            @endif
        </section>
    </nav>
</header>
