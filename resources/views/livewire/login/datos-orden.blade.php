<section class="flex flex-col w-full justify-center px-[30%] pt-10">
    <div class="flex flex-col items-center mb-5">
        <div class="flex justify-center size-fit font-bold border border-[#e2e8ef] rounded-2xl text-sm px-3 py-1 mb-5">
            <p>No. orden&nbsp;</p>
            <p>{{ $orden }}</p>
        </div>
        <div class="mb-5 text-center">
            <p class="text-3xl font-bold">Datos de la Orden</p>
        </div>
        <div class="text-center">
            <p class="text-[#62748e]">
                Aquí encontrarás información detallada sobre el servicio solicitado para tu vehículo. Desde el tipo de mantenimiento realizado, piezas reemplazadas, observaciones técnicas del mecánico, hasta fechas estimadas de entrega.
            </p>
        </div>
    </div>

    <div class="flex flex-col gap-5 mb-5">
        <div class="bg-white border-[#e1e8ef] border-1">
            <button onclick="toggleAccordion(1)" class="w-full flex justify-between items-center text-slate-800 cursor-pointer pt-6 pb-6 ps-5 pe-5">
                <span class="font-semibold">Detalles del Vehículo</span>
                <span id="icon-1" class="text-slate-800 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <div id="content-1" class="bg-white max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="grid border-[#d5d5d5] border-1 p-7 gap-6 lg:grid-cols-[0.8fr_1.5fr_1fr] md:grid-cols-1">
                    <div class="flex">
                        <div class="flex-1">
                            <div class="grid mb-3 md:grid-cols-[auto_1fr] grid-cols-1 break-words">
                                <p class="font-bold text-[#575757]">Tipo:&nbsp;</p>
                                <p>{{ $tipoVehiculo }}</p>
                            </div>
                            <div class="grid mb-3 md:grid-cols-[auto_1fr] grid-cols-1 break-words">
                                <p class="font-bold text-[#575757]">Línea:&nbsp;</p>
                                <p>{{ $lineaVehiculo }}</p>
                            </div>
                            <div class="grid mb-3 md:grid-cols-[auto_1fr] grid-cols-1 break-words">
                                <p class="font-bold text-[#575757]">Marca:&nbsp;</p>
                                <p>{{ $marcaVehiculo }}</p>
                            </div>
                            <div class="grid mb-3 md:grid-cols-[auto_1fr] grid-cols-1 break-words">
                                <p class="font-bold text-[#575757]">Color:&nbsp;</p>
                                <p>{{ $colorVehiculo }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border-[#e1e8ef] border-1">
            <button onclick="toggleAccordion(2)" class="w-full flex justify-between items-center text-slate-800 cursor-pointer pt-6 pb-6 ps-5 pe-5">
                <span class="font-semibold">Detalles del trabajo realizado</span>
                <span id="icon-2" class="text-slate-800 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <div id="content-2" class="bg-white max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="grid border-[#d5d5d5] border-1 p-7 gap-6">
                    <div>
                        <div class="flex gap-5"><p class="font-bold text-[#575757]">Nombre:</p><p>{{ $nombreCliente }}</p></div>
                        <div class="flex gap-5"><p class="font-bold text-[#575757]">NIT:</p><p>{{ $nitCliente }}</p></div>
                        <div class="flex gap-5"><p class="font-bold text-[#575757]">Dirección:</p><p>{{ $direccionCliente }}</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid items-center">
        <section class="mb-5">
            <div class="bg-white border-[#e1e8ef] border-1">
                <div class="w-full flex justify-between items-center text-slate-800 pt-4 pb-4 ps-5 pe-5">
                    <p class="font-semibold">Total a Pagar</p>
                    <p class="font-bold">Q.{{ $total }}</p>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="bg-white border-[#e1e8ef] border-1">
                <div class="px-3 py-4 flex flex-col gap-2">
                    <div class="flex justify-between items-center">
                        <svg viewBox="0 0 32 32" class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <path d="M16 2.672c-7.361 0-13.328 5.967-13.328 13.328s5.967 13.328 13.328 13.328 13.328-5.967 13.328-13.328c0-7.361-5.967-13.328-13.328-13.328zM16 28.262c-6.761 0-12.262-5.5-12.262-12.262s5.5-12.262 12.262-12.262 12.262 5.5 12.262 12.262c0 6.761-5.5 12.262-12.262 12.262z"/>
                            <path d="M15.955 9.013c-2.706 0-4.217 1.672-4.236 4.322h1.176c-0.037-1.922 0.97-3.332 3.005-3.332 1.455 0 2.668 1.026 2.668 2.519 0 0.97-0.523 1.754-1.213 2.407-1.418 1.316-1.815 1.935-1.887 3.738h1.191c0.07-1.635 0.034-1.602 1.461-3.029 0.952-0.896 1.623-1.792 1.623-3.173 0-2.164-1.717-3.452-3.787-3.452z"/>
                            <path d="M16 20.799c-0.588 0-1.066 0.477-1.066 1.066 0 0.589 0.478 1.066 1.066 1.066s1.066-0.477 1.066-1.066c0-0.588-0.477-1.066-1.066-1.066z"/>
                        </svg>
                        <button class="border-[#e1e8ef] border-1 px-4 py-2 rounded-lg cursor-pointer hover:bg-slate-100 transition">
                            Contáctanos
                        </button>
                    </div>
                    <div class="flex flex-col mt-2">
                        <p class="font-bold">¿Tienes alguna duda?</p>
                        <p class="text-[#62748e]">Nuestro equipo de ventas está listo para resolver todas tus dudas.</p>
                    </div>

                </div>
            </div>
        </section>

        <section class="flex justify-center">
            <button type="submit" wire:click='redirectCleanHome' class="bg-[#1987c3] text-white rounded-lg py-2 px-4 cursor-pointer">Regresar al sistema</button>
        </section>
    </div>
</section>

<script>
    function toggleAccordion(id) {
        const content = document.getElementById(`content-${id}`);
        const icon = document.getElementById(`icon-${id}`);
        if (content.classList.contains('max-h-0')) {
            content.classList.remove('max-h-0');
            content.classList.add('max-h-[500px]');
            icon.classList.add('rotate-180');
        } else {
            content.classList.remove('max-h-[500px]');
            content.classList.add('max-h-0');
            icon.classList.remove('rotate-180');
        }
    }
</script>
