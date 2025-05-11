<section class="flex flex-col lg:flex-row justify-between px-6 lg:px-[100px] pt-10 gap-10">
    <section class="flex flex-col justify-center items-center w-full lg:w-1/2">
        <div class="text-center mb-7">
            <p class="text-[#446482] text-2xl md:text-3xl">Bienvenido a</p>
            <h1 class="text-[#0f4173] font-bold text-4xl md:text-6xl">Grupo Los Tres</h1>
            <h1 class="text-[#1987c3] font-bold text-4xl md:text-6xl">Online</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-[90%] mb-7">
            <div class="flex gap-2 items-center">
                <img src="{{ Vite::asset('resources/img/Group8.png') }}" alt="group8" class="w-8 h-8">
                <p class="text-[#083a71] text-sm md:text-base">Consulte el detalle de su Orden de Trabajo</p>
            </div>            
            <div class="flex gap-2 items-center">
                <img src="{{ Vite::asset('resources/img/Group6.png') }}" alt="group6" class="w-8 h-8">
                <p class="text-[#083a71] text-sm md:text-base">Pague en línea de forma segura</p>
            </div>            
        </div>
        <div>
            <img src="{{ Vite::asset('resources/img/Group14.png') }}" alt="group14" class="w-200">
        </div>
    </section>
    <section class="flex justify-center items-center w-full lg:w-1/2">
        <form class="bg-[#e6f0f5] w-full max-w-md p-6 md:p-[50px] rounded-md" wire:submit.prevent="procesarOrden">
            <div class="text-center mb-7">
                <h3 class="text-[#284664] font-bold text-2xl md:text-4xl">Consultar Orden</h3>
                <p class="text-[#5f738c] text-sm">Ingresa los siguientes datos para acceder al estatus de tu orden</p>
            </div>
            <div class="mb-7">
                <div class="flex flex-col mb-7">
                    <label for="noOrden" class="text-[#284664] font-medium mb-2">Número de Orden</label>
                    <input id="noOrden" wire:model="noOrden" type="text" class="bg-white border border-[#e1e6f0] rounded-lg p-2" />
                </div>
                <div class="flex flex-col">
                    <label for="noPlaca" class="text-[#284664] font-medium mb-2">Número de Placa</label>
                    <input id="noPlaca" wire:model="noPlaca" type="text" class="bg-white border border-[#e1e6f0] rounded-lg p-2" />
                </div>
            </div>
            <div class="mb-7">
                <div class="flex items-center gap-2">
                    <input id="termsConditions" wire:model="aceptaTerminos" type="checkbox" class="w-4 h-4 border-2 border-[#1987c3] rounded-sm bg-white shrink-0 checked:bg-[#1987c3] checked:border-0" />
                    <label for="termsConditions" class="text-[#8d9aae] text-sm cursor-pointer">He leído y estoy de acuerdo con los Términos y Condiciones.</label>
                </div>
            </div>
            <div>
                <button type="submit" class="w-full bg-[#1987c3] text-white rounded-lg py-2 cursor-pointer" wire:click="procesarOrden">Continuar</button>
            </div>
        </form>
    </section>
</section>
