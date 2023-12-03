  <div class="basis-6/6 md:basis-1/6 bg-[#020a73] text-white md:pt-8  md:sticky md:top-14 pb-8 select-none mx-0 mt-2 md:mt-0 max-h-screen relative overflow-hidden border-r dark:bg-slate-900 dark:text-slate-400">
    <div class="absolute left-0 top-0 h-16 w-16 ">
      <h2 class="md:mx-2 uppercase font-thin -mb-2 mt-4 md:mt-20 tracking-tighter">Main Dashboard</h2>
      <div class="absolute transform -rotate-45 bg-white text-center text-black font-semibold py-1 left-[-40px] top-[32px] w-[170px] dark:bg-slate-900 dark:text-slate-400 dark:border-t dark:border-b">
        SOMA
      </div>
      <div class="mt-4">
        {{ $slot }}
      </div>
    </div>
  </div>
