<div class="flex h-screen md:mb-0 bg-no-repeat md:bg-fixed lg:bg-fixed" style="background-image: url('/static/cta-bg.jpg');">
    <div class="w-full max-w-sm m-auto border border-1 bg-indigo-500 rounded p-5"> 
        <header>
            <img class="w-12 mx-auto mb-5" src="{{ asset('static/favicon.png') }}"/>
        </header>
        <div class="pt-2 text-center">
            <h1 class="font-extrabold text-white justify-center">LOGIN</h1>
        </div>
        {{ $slot }}
    </div>
</div>
<x-soma-ribbon/>