  <div class="min-w-screen h-fit md:h-fit overflow-hidden dark:text-slate-400 bg-no-repeat md:bg-fixed lg:bg-fixed" style="background-image: url('/static/cta-bg.jpg');">
    <div class="w-full">
      <div class="py-4 mx-2 md:mx-4 lg:mx-4 bg-transparent shadow-2xl bg-gray-100">
        <div class="text-center py-4 bg-gray-100 md:bg-brightness-125 dark:bg-gray-200">
          <div class="flex inline-flex uppercase body-font font-voodoo font-light text-2xl text-blue-500 md:text-4xl mb-2 scale3d-125 dark:text-slate-500 items-center">
            <span>
              <img class="w-6 h-6 md:w-8 md:h-8 lg:w-8 lg:h-8 mt-1 ring mr-0.5 mr-2 md:mr-4 lg:mr-4 rounded-md" src="/storage/storage/{{ Auth::user()->school->image }}"/>
            </span>
            <span style="text-shadow: 0 1px 0 #ccc, 0 2px 0 #ccc,0 3px 0 #ccc,0 4px 0 #ccc,0 5px 0 #ccc, 0 6px 0 #ccc,0 7px 0 #ccc, 0 8px 0 #ccc,0 9px 0 #ccc, 0 10px 0 #ccc,0 11px 0 #ccc, 0 12px 0 #ccc,0 20px 30px rgba(0, 0, 0, 0.5);" class="text-base md:text-[40px] lg:text[40px]">
              <span class="sm:flex-shrink">{{ \Auth::user()->school->name }}</span>
            </span>
          </div>
        </div>
        <div class="text-white bg-transparent dark:text-slate-400 dark:bg-slate-900 py-4">
          {{ $slot }}
        </div>
    </div>
    </div>
  </div>