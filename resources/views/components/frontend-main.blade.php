  <div class="max-w-full bg-blue-300 h-fit md:h-auto flex-wrap overflow-hidden dark:bg-slate-900 dark:text-slate-400">
    <div class="md:mx-16 lg:mx-16 mt-4 mb-8">
      <div><h1 class="uppercase font-extrabold text-center text-1xl md:text-3xl mb-8">{{ \Auth::user()->school->name }}</h1></div>
      {{ $slot }}
    </div>
  </div>