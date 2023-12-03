  <div class="max-w-full bg-blue-300 h-fit md:h-auto flex-wrap overflow-hidden dark:bg-slate-900 dark:text-slate-400">
    <div class="md:mx-16 lg:mx-16 mt-4 mb-8 w-fulll">
      <div class="inline-flex mx-auto">
        <x-academicon-inaturalist class="w-12 h-12 text-white"/>
        <h1 class="uppercase body-font font-voodoo font-light text-center text-1xl text-red-700 md:text-3xl mb-8 mt-2">
          {{ \Auth::user()->school->name }}
        </h1>
      </div>
      {{ $slot }}
    </div>
  </div>