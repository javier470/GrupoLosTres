<section class="mb-15">
    <section class="w-full grid grid-cols-2">
        <div class="w-full pt-3 pb-3 text-center text-[#878787] font-bold cursor-pointer  {{ $vista === 'actuales' ? 'prosOrdenActive' : '' }}" 
            wire:click="changeVista('actuales')">
            Actuales
        </div>
        <div class="w-full pt-3 pb-3 text-center text-[#878787] font-bold cursor-pointer  {{ $vista === 'historial' ? 'prosOrdenActive' : '' }}" 
            wire:click="changeVista('historial')">
            Historial
        </div>
    </section>

    <section class="mt-20">
        <div class="flex justify-around mb-20">
            <div class="flex justify-center font-bold text-lg">
                <p class="text-[#1e89c5]">Orden:&nbsp;</p>
                <p class="text-[#294666]">{{ $orden }}</p>
            </div>
            <div class="flex justify-center font-bold text-lg">
                <p class="text-[#1e89c5]">Estado:&nbsp;</p>
                <p class="text-[#294666]">{{ $estado }}</p>
            </div>
        </div>
        <div class="flex flex-col gap-3 ms-[125px] me-[125px] mb-25">
            <div class="relative w-full px-2">
                <div class="absolute top-[8.97rem] left-[10%] w-[80%] h-2 bg-gray-300 z-0"></div>
                <div class="absolute top-[8.97rem] left-[10%] h-2 bg-[#1d89c4] z-10 transition-all duration-500"
                    style="width: {{ ($pasoActual / (count($pasos) - 1)) * 80 }}%;"></div>

                <div class="flex justify-between items-start relative z-20">
                    @foreach($pasos as $index => $paso)
                        <div class="flex flex-col items-center w-1/5 text-center">
                            <img src="{{ Vite::asset('resources/img/' . $paso['icono']) }}"
                                class="w-25 h-25 mb-10 {{ $index <= $pasoActual ? 'opacity-100' : 'contrast-2 opacity-40' }}">

                            <div class="w-4 h-4 rounded-full border-2 
                                {{ $index <= $pasoActual ? 'bg-[#0f4175] border-[#0f4175]' : 'bg-white border-gray-300' }}">
                            </div>

                            <span class="mt-2 text-xs leading-tight {{ $index <= $pasoActual ? 'text-[#575757] font-medium' : 'text-[#575757]' }}">
                                {{ $paso['titulo'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="flex justify-center mt-7">
                <button type="submit" class="w-50 bg-[#1987c3] mt-7 text-sky-50 rounded-lg pt-2 pb-2 cursor-pointer {{ $pasoActual != 4 ? 'btnProcedePagoDisabled' : '' }}" @if ($pasoActual != 4) disabled @endif>Proceder al pago</button>
            </div>
        </div>
        <div></div>
    </section>
    
    <section class="mb-30 mx-4 lg:mx-[125px]">
        <div class="bg-[#f8f9fb] border-[#e1e8ef] border-1">
            <button onclick="toggleAccordion(1)" class="w-full flex justify-between items-center text-slate-800 cursor-pointer pt-6 pb-6 ps-5 pe-5">
                <span class="text-semibold">Detalles de la Orden</span>
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
                            <p class="font-bold text-[#1d89c4] mb-5">Datos de la Orden</p>
                            <div class="grid mb-3 md:grid-cols-[auto_1fr] grid-cols-1 break-words">
                                <p class="font-bold text-[#575757]">No. de Orden:&nbsp;</p>
                                <p>{{ $orden }}</p>
                            </div>
                            <div class="grid mb-3 md:grid-cols-[auto_1fr] grid-cols-1 break-words">
                                <p class="font-bold text-[#575757]">No. de Placa:&nbsp;</p>
                                <p>{{ $placa }}</p>
                            </div>
                        </div>
                        <div class="inline-block h-[250px] w-0.5 self-stretch bg-neutral-100 dark:bg-white/10 ms-3 me-3"></div>
                    </div>

                    <div>
                        <p class="font-bold text-[#1d89c4] mb-5">Datos del Cliente</p>
                        <div class="grid grid-cols-[35%_65%] mb-3"><p class="font-bold text-[#575757]">Nombre:</p><p>{{ $nombreCliente }}</p></div>
                        <div class="grid grid-cols-[35%_65%] mb-3"><p class="font-bold text-[#575757]">NIT:</p><p>{{ $nitCliente }}</p></div>
                        <div class="grid grid-cols-[35%_65%] mb-3"><p class="font-bold text-[#575757]">Dirección:</p><p>{{ $direccionCliente }}</p></div>
                    </div>

                    <div class="flex">
                        <div class="inline-block h-[250px] w-0.5 self-stretch bg-neutral-100 dark:bg-white/10 ms-3 me-10"></div>
                        <div class="flex-1">
                            <p class="font-bold text-[#1d89c4] mb-5">Datos del Vehículo</p>
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

        <script>
            function toggleAccordion(index) {
                const content = document.getElementById(`content-${index}`);
                const icon = document.getElementById(`icon-${index}`);

                const upSVG = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>`;

                const downSVG = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
                </svg>`;

                if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                    content.style.maxHeight = '0';
                    icon.innerHTML = upSVG;
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.innerHTML = downSVG;
                }
            }
        </script>
    </section>


</section>