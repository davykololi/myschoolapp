<div class="max-w-screen h-fit py-2 md:mb-0 bg-no-repeat md:bg-fixed lg:bg-fixed" style="background-image: url('/static/cta-bg.jpg');">
    <div class="max-w-md px-3 rounded-lg mx-auto overflow-hidden bg-transparent border rounded my-16 dark:bg-[#32302f] dark:text-slate-400">
        <div class="text-center mt-6 pt-4"><img src="{{ asset('static/favicon.png') }}" class="mx-auto w-10 h-10"/></div>
        {{ $slot }}
    </div>
</div>