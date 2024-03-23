<nav class="border-b text-white sticky top-0 bg-blue-700 z-10 dark:bg-gray-800 dark:text-white">
    <div x-data="{showMenu : false}" class="container max-w-screen-lg mx-0 flex justify-between h-14">
        <!-- Brand-->
        <a href="{{ url('/') }}" class="flex items-center cursor-pointer hover:bg-purple-50 px-2">
            <!-- Logo-->
            <img src="{{ asset('static/favicon.png') }}" class="w-8 h-8"/>
            <div class="font-semibold ml-2 uppercase font-extrabold justify-center hover:lg:text-black font-extrabold">
                {{ config('app.name') }}
            </div>
        </a>
        <!-- Navbar Toggle Button -->
        <button @click="showMenu = !showMenu" class="block md:hidden text-gray-700 p-2 rounded hover:border focus:border focus:bg-gray-100 my-2 mr-5" type="button" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <!-- Nav Links-->
        <ul class="md:flex text-base mr-3 origin-top"
            :class="{ 'block absolute top-14 border-b bg-white w-full p-2': showMenu, 'hidden': !showMenu}"
            id="navbar-main" x-cloak>
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800" :class="showMenu && 'py-1'">
                <x-sidenav-toggler-button/>
            </li>
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800" :class="showMenu && 'py-1'">
                <a href="#">ASSIGNMENTS</a>
            </li>
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800" :class="showMenu && 'py-1'">
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <x-darkmode-togglebutton/>
            </a>
      </li>
        </ul>

        <ul class="md:flex text-base mr-3 origin-top"
            :class="{ 'block absolute top-14 border-b bg-white w-full p-2': showMenu, 'hidden': !showMenu}"
            id="navbar-main" x-cloak>
            @guest
            @if (Route::has('login'))
            <li class="py-2 md:py-0">
                <a href="{{ route('login') }}" class="nav-a-right">
                    <button class="bg-gradient-to-r from-red-200 to-red-800 via-red-500 px-2 py-1 text-white rounded-md hover:text-red-500 hover:bg-gradient-to-l from-black to-white via-red-700 hover:shadow-2xl">
                        Signin
                    </button>
                </a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="py-2 md:py-0">
                <a href="{{ route('register') }}" class="nav-a-right">
                    <button class="bg-gradient-to-r from-red-200 to-red-800 via-red-500 px-2 py-1 text-white rounded-md hover:text-red-500 hover:bg-gradient-to-l from-black to-white via-red-700 hover:shadow-2xl">
                        Signup
                    </button>
                </a>
            </li>
            @endif

            @else
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm text-white font-medium hover:text-red-800 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="font-bold hover:text-indigo-500">Welcome: {{ Auth::user()->first_name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <span class="font-bold text-red-800 lg:hover:text-red-500">{{ __('Logout') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endguest
        </ul>
    </div>
</nav>