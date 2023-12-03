<nav class="border-b text-gray-900 bg-blue-500 sticky top-0 z-10 dark:bg-slate-900 dark:text-slate-400">
    <div x-data="{showMenu : false}" class="container max-w-screen-lg mx-0 flex justify-between h-14">
        <!-- Brand-->
        <a href="{{ url('/') }}" class="flex items-center cursor-pointer hover:bg-purple-50 px-2">
            <!-- Logo-->
            <img src="{{ asset('static/favicon.png') }}" class="w-8 h-8"/>
            <div class="font-semibold ml-2 uppercase font-extrabold justify-center hover:lg:text-black">{{ config('app.name') }}</div>
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
                <x-librarian-sidenav-toggler/>
            </li>
            @can('seniorLibrarian')
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800" :class="showMenu && 'py-1'">
                <a href="{{ route('librarian.category-books.index') }}">BOOKS CAT</a>
            </li>
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800" :class="showMenu && 'py-1'">
                <a href="{{ route('librarian.books.index') }}">BOOKS</a>
            </li>
            @endcan
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800" :class="showMenu && 'py-1'">
                <a href="{{ route('librarian.bookers.index') }}">ISSUED BOOKS</a>
            </li>
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800" :class="showMenu && 'py-1'">
                <a href="{{ route('librarian.school.libraries') }}">LIBRARIES</a>
            </li>
            <li class="px-3 cursor-pointer hover:bg-purple-50 flex items-center hover:text-gray-800">
                <x-darkmode-togglebutton/>
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
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <x-auth-user-image/>
                            <x-auth-user-name/>
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
                            <x-dropdown-link href="{{ route('librarian.profile') }}">
                                <span class="font-bold text-red-800 md:hover:text-red-500">Profile</span>
                            </x-dropdown-link>
                            <x-dropdown-link href="{{route('librarian.change-password.form')}}">
                                <span class="font-bold text-red-800 md:hover:text-red-500">Change Password</span>  
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
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