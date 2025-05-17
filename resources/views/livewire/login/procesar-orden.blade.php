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

    @if($vista === 'actuales')
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

                <div class="flex justify-between items-start relative z-10">
                    @foreach($pasos as $index => $paso)
                        <div class="flex flex-col items-center w-1/5 text-center">
                            <img src="{{ asset('img/' . $paso['icono']) }}"
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
                <button wire:click="openModal" class="w-50 bg-[#1987c3] mt-7 text-sky-50 rounded-lg pt-2 pb-2 cursor-pointer {{ $pasoActual != 4 ? 'btnProcedePagoDisabled' : '' }}" @if ($pasoActual != 4) disabled @endif>Proceder al pago</button>
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

        @if($showModal)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-center justify-end me-10 p-4 text-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-md sm:p-6">
                        <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                            <button type="button" wire:click="closeModal"  class="rounded-md bg-white cursor-pointer text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Close</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 ml-2 sm:text-left max-w-96">
                                <h3 class="text-2xl font-bold text-[#1d89c4]" id="modal-title">Detalles de la Orden</h3>
                                <div class="mt-2">
                                    {{-- Detalles --}}
                                    <section class="flex flex-col gap-5">
                                        <div class="bg-[#f8f9fb] border-[#e1e8ef] border-1">
                                            <button onclick="toggleAccordion(2)" class="w-full flex justify-between items-center text-slate-800 cursor-pointer pt-4 pb-4 ps-5 pe-5">
                                                <span class="text-semibold">Detalles del vehículo</span>
                                                <span id="icon-2" class="text-slate-800 transition-transform duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <div id="content-2" class="bg-white max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
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

                                        <div class="bg-[#f8f9fb] border-[#e1e8ef] border-1">
                                            <button onclick="toggleAccordion(3)" class="w-full flex justify-between items-center text-slate-800 cursor-pointer pt-4 pb-4 ps-5 pe-5">
                                                <span class="text-semibold">Detalles del trabajo realizado</span>
                                                <span id="icon-3" class="text-slate-800 transition-transform duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>

                                            <div id="content-3" class="bg-white max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
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
                                    </section>

                                    {{-- Divisor --}}
                                    <div class="my-7 inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-gray-300"></div>
                                    </div>

                                    <section>
                                        <div class="flex flex-col gap-3">
                                            <div wire:click='selectMethod("credito")' class="flex justify-between items-center py-3 px-2 border-1 cursor-pointer border-[#e2e8ef] rounded-lg">
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('img/creditCard.svg') }}" alt="group8" class="w-7 h-7 {{ $method == 'credito' ? '' : 'contrast-0'}}">
                                                    <p class="font-semibold">Tarjeta de crédito</p>
                                                </div>
                                                <div class="me-4">
                                                    <label aria-label="Pink" class="relative w-[14px] h-[14px] -m-0.5 flex cursor-pointer items-center ring-1 justify-center rounded-full p-0.5 text-[#1d89c4] ring-current focus:outline-hidden">
                                                        <input type="radio" name="color-choice" value="Pink" class="sr-only">
                                                        <span aria-hidden="true" class="size-10 h-[10px] rounded-full {{ $method == 'credito' ? 'bg-current border border-[#1d89c4]'  : 'bg-white' }}"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div wire:click='selectMethod("banco")' class="flex justify-between items-center py-3 px-2 border-1 cursor-pointer border-[#e2e8ef] rounded-lg">
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('img/moneyBill.svg') }}" alt="group8" class="w-7 h-7 {{ $method == 'banco' ? '' : 'contrast-0'}}">
                                                    <p class="font-semibold">Deposito bancario</p>
                                                </div>
                                                <div class="me-4">
                                                    <label aria-label="Pink" class="relative w-[14px] h-[14px] -m-0.5 flex cursor-pointer items-center ring-1 justify-center rounded-full p-0.5 text-[#1d89c4] ring-current focus:outline-hidden">
                                                        <input type="radio" name="color-choice" value="Pink" class="sr-only">
                                                        <span aria-hidden="true" class="size-10 h-[10px] rounded-full  {{ $method == 'banco' ? 'bg-current border border-[#1d89c4]'  : 'bg-white' }}"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </section>

                                    {{-- Divisor --}}
                                    <div class="mt-6 mb-7 inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-gray-300"></div>
                                    </div>

                                    <section>
                                        <div class="mb-5">
                                            <div class="flex flex-col mb-5">
                                                <label for="nombreTarjeta" class="text-sm font-semibold">Nombre en la tarjeta</label>
                                                <input autocomplete="off" id="nombreTarjeta" type="text" placeholder="Nombre en la tarjeta" class="bg-white border border-[#e1e6f0] rounded-lg p-2" />
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="noTarjeta" class="text-sm font-semibold">Número de tarjeta</label>
                                                <input autocomplete="off" id="noTarjeta" type="text" placeholder="0000 0000 0000 0000" class="bg-white border border-[#e1e6f0] rounded-lg p-2" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-7">
                                            <div class="flex flex-col">
                                                <label for="expirationDate" class="text-sm font-semibold">Expiración</label>
                                                <input autocomplete="off" id="expirationDate" type="text" placeholder="--/--" class="bg-white border border-[#e1e6f0] rounded-lg p-2" />
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="cvv" class="text-sm font-semibold">CVV</label>
                                                <input autocomplete="off" id="cvv" type="text" placeholder="***" class="bg-white border border-[#e1e6f0] rounded-lg p-2" />
                                            </div>
                                        </div>
                                    </section>

                                    {{-- Divisor --}}
                                    <div class="my-7 inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-gray-300"></div>
                                    </div>

                                    <section>
                                        <div class="bg-[#f8f9fb] border-[#e1e8ef] border-1">
                                            <div class="w-full flex justify-between items-center text-slate-800 pt-4 pb-4 ps-5 pe-5">
                                                <p class="font-semibold">Total a Pagar</p>
                                                <p class="font-bold">Q.{{ $total }}</p>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 mx-2 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <button type="button" wire:click='payment' class="cursor-pointer inline-flex w-full justify-center rounded-md bg-[#1d89c4] px-3 py-3 text-sm font-semibold text-white sm:ml-3 sm:w-auto">
                                Pagar Orden ->
                            </button>
                            <button type="button" wire:click="closeModal" class="cursor-pointer mt-3 inline-flex w-full justify-center rounded-md bg-white px-5 py-3 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset sm:mt-0 sm:w-auto">
                                cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
    @endif

    @if($showModalError)
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-10 py-10 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm">
                <div>
                    <div class="mx-auto flex size-12 items-center justify-center">
                        <img src="{{ asset('img/iconError.svg') }}" alt="group8" class="w-30 h-30">
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-xl font-bold text-[#4c4c4c]" id="modal-title">Pago Fallido</h3>
                        <div class="mt-2">
                        <p class="text-sm text-[#62748e]">Ocurrió un error. Por favor intente de nuevo o consulte con la entidad emisora de su tarjeta. También puede solicitar asistencia llamando al PBX: 2301-0000.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button type="button" wire:click='closeModalError'
                        class="inline-flex w-full justify-center rounded-md bg-[#1d89c4] cursor-pointer px-3 py-3 text-sm font-semibold text-white ">
                        Intentar de nuevo
                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endif

    @if($showModalSucess)
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-12 py-12 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm">
                <div>
                    <div class="mx-auto flex size-12 items-center justify-center">
                        <img src="{{ asset('img/iconSuccess.svg') }}" alt="group8" class="w-30 h-30">
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-xl font-bold text-[#4c4c4c]" id="modal-title">Pago Exitoso</h3>
                        <div class="mt-2">
                        <p class="text-sm text-[#62748e]">Gracias por utilizar nuestro servicio. Recomendamos imprimir el detalle de la orden utilizando el enlace a continuación</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 mt-5 sm:mt-6">
                    <button type="button" wire:click='redirectDatos'
                        class="inline-flex w-full justify-center rounded-md bg-[#1d89c4] cursor-pointer px-3 py-3 text-sm font-semibold text-white ">
                        Imprimir
                        <svg viewBox="0 0 24 24" class="w-8 h-5" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="m8 12 4 4 4-4" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 16V4M19 17v.6c0 1.33-1.07 2.4-2.4 2.4H7.4C6.07 20 5 18.93 5 17.6V17" stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                            </g>
                        </svg>
                    </button>
                    <button type="button" wire:click='closeModalSucess'
                        class="inline-flex w-full justify-center rounded-md border border-[#e2e8ef] cursor-pointer px-3 py-3 text-sm font-semibold text-black ">
                        Salir
                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endif
    @if($vista === 'historial')
    <section class="mt-20 mb-30 mx-50 lg:mx-50 min-h-[calc(75vh-200px)]"> {{-- Ajusta 200px según el alto de tu header+footer --}}
        @foreach($listaProcesos as $or)
        <div class="bg-[#f8f9fb] border-[#e1e8ef] border-1 rounded-sm overflow-hidden">
            <button onclick="toggleAccordionHistory({{ $loop->index }})" class="w-full flex justify-between items-center text-slate-800 cursor-pointer py-8 ps-5 pe-5">
                <div class="flex justify-between items-center w-full me-10 h-16">
                    <div class="flex items-center font-bold text-xl">
                        <p class="text-[#1e89c5]">Orden:&nbsp;</p>
                        <p class="text-[#294666]">{{ $or['orden'] }}</p>
                    </div>
                    <div class="rounded-3xl bg-[#78c0e8] py-2 px-4 border border-transparent text-xs text-white transition-all">
                        {{ $or['estado'] }}
                    </div>
                </div>
                <span id="iconHistory-{{ $loop->index }}" class="text-slate-800 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <div id="contentHistory-{{ $loop->index }}" class="bg-white max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="grid border-[#d5d5d5] border-1 p-7 gap-6 lg:grid-cols-[0.8fr_1.5fr_1fr] md:grid-cols-1">
                    <div class="flex flex-col lg:flex-row">
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

                    <div class="flex flex-col lg:flex-row">
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
        @endforeach
    </section>
    @endif


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
        function toggleAccordionHistory(index) {
            const content = document.getElementById(`contentHistory-${index}`);
            const icon = document.getElementById(`iconHistory-${index}`);
            const upSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>`;
            const downSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
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