<!--Header-->
  <header class="dark:bg-slate-900 bg-white py-6 lg:py-12 dark:text-white text-black font-gemunu uppercase border-b border-gray-400 mt-8 md:mt-0 lg:mt-0 md:-mb-4 lg:-mb-4"> <!--py=yukarıdan aşağıya padding-->
    <!--Header Container-->
    <div class="container flex items-center justify-between space-x-8 lg:space-x-16">
        <!--Logo Kısmı-->
        <img style="width:5%" src="/static/school_logo.png" class="-mt-8 md:ml-4 rounded">
        <div class="ml-4 uppercase font-bold text-white">{{ config('app.name') }}</div>
        <!--Menu Icon For Small Screens-->
        <div class="block md:hidden pr-4">
          <div class="space-y-1 cursor-pointer">
            <div class="bg-gega-grey w-8 h-1 rounded-full"></div>
            <div class="bg-gega-grey w-8 h-1 rounded-full"></div>
            <div class="bg-gega-grey w-8 h-1 rounded-full"></div>
          </div>
        </div>
        <!--Navigation-->
        <nav class="hidden md:flex justify-between flex-1">
          <!--Menu-->
          <div class="flex items-center lg:text-lg space-x-4 lg:space-x-8">
            <a href="{{ url('/') }}" class="hover:text-gega-melon transition duration-500">home</a>
            <a href="{{ route('about.us') }}" class="hover:text-gega-melon transition duration-500">about</a>
            <a href="{{ route('contact.us') }}" class="hover:text-gega-melon transition duration-500">contact</a>
            <a href="#" class="hover:text-gega-melon transition duration-500">blog</a>
            <a href="#" class="hover:text-gega-melon transition duration-500">menus</a>
          </div>
          <!--Login Area-->
          <div class="flex items-center space-x-4 lg:space-x-8">
            <!--Search-->
            <form >
              <div class="group border-r px-4 mx-4 py-1 border-gega-red">
                <input type="text" class="opacity-10 group-hover:opacity-100 bg-transparent border-b border-gega-red focus:outline-none w-24 lg:w-44 transition duration-500">
                <button class="-ml-4 group-hover:ml-0 transition duration-500">
                  <i class="fas fa-search group-hover:text-gega-red transition duration-500">
                  </i>
                </button>
              </div>
            </form>
            <!--Sign Up-->
            <div class="flex items-center space-x-4 lg:space-x-8 lg:text-lg">
              <a href="{{ route('login') }}" class="border border-white px-3 py-1 hover:bg-[#0F266E] hover:text-white cursor-pointer transition duration-500 whitespace-nowrap">Login</a>
            </div>
          </div>
        </nav>
    </div>
  </header>