<div class="flex max-w-screen h-fit md:min-h-screen lg:min-h-screen md:mb-0 bg-no-repeat md:bg-fixed lg:bg-fixed py-16" style="background-image: url('/static/cta-bg.jpg');">
    <div class="w-full max-w-sm m-auto border border-1 bg-transparent rounded p-5"> 
        <header>
            <img class="w-12 mx-auto mb-5" src="{{ asset('static/favicon.png') }}"/>
        </header>
        {{ $slot }}
    </div>
</div>