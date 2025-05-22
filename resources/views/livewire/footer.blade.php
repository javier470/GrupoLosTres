<footer class="bg-[#0e4072] w-full pt-[30px] mt-20 pb-[30px] flex flex-col md:flex-row justify-between items-center text-sky-50 px-[30px] gap-6 md:gap-0">
    <section class="text-center md:text-left">
        <p>©2025. Grupo Los Tres Online. Reservados Todos los Derechos.</p>
    </section>
    <section>
        <img src="{{ asset('img/frame2.png') }}" alt="Logo" class="w-40 md:w-52">
    </section>
    <section class="text-center md:text-right">
        <div class="flex justify-center md:justify-end">
            <p>Desarrollado por&nbsp;</p>
            <p class="font-bold">Perinola</p>
        </div>
    </section>
    <div wire:click='redirectToSupport' class="bg-[#0f4175] w-12 h-12 flex items-center justify-center bottom-[15%] right-[2%] fixed z-1 rounded-full cursor-pointer">
        <img src="{{ asset('img/a.png') }}" alt="group8" class="w-10 h-11 p-2">
    </div>
</footer>

