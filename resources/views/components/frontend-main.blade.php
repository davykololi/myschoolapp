  <div class="max-w-screen h-fit md:h-fit overflow-hidden dark:text-slate-400 bg-no-repeat md:bg-fixed lg:bg-fixed" style="background-image: url('/static/cta-bg.jpg');">
    <div class="w-full">
      <div class="px-2 py-4 md:mx-16 lg:mx-16 bg-gray-100 shadow-2xl dark:bg-slate-900">
        <div class="text-center">
          <h1 class="uppercase body-font font-voodoo font-light text-center text-2xl text-blue-500 md:text-4xl mb-8 mt-8 scale3d-125 dark:text-slate-400">
            <span style="text-shadow: 0 1px 0 #ccc, 0 2px 0 #ccc,0 3px 0 #ccc,0 4px 0 #ccc,0 5px 0 #ccc, 0 6px 0 #ccc,0 7px 0 #ccc, 0 8px 0 #ccc,0 9px 0 #ccc, 0 10px 0 #ccc,0 11px 0 #ccc, 0 12px 0 #ccc,0 20px 30px rgba(0, 0, 0, 0.5);">
              {{ \Auth::user()->school->name }}
            </span>
          </h1>
        </div>
      {{ $slot }}
    </div>
    </div>
  </div>