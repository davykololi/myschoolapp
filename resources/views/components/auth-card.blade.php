<div class="max-w-screen h-screen pt-2 md:mb-0 bg-no-repeat md:bg-fixed lg:bg-fixed" style="background-image: url('/static/cta-bg.jpg');">
    <div class="min-w-screen bg-transparent border border-white mx-2 md:w-2/6 lg:w-2/6 md:mx-auto h-[12cm] mt-2 lg:mt-4 rounded-md flex-grow shadow-2xl dark:bg-[#32302f] dark:text-slate-400">
        <div class="text-center mt-6 pt-4"><img src="{{ asset('static/favicon.png') }}" class="mx-auto w-10 h-10"/></div>
        {{ $slot }}
    </div>
</div>