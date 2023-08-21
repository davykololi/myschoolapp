<div class="max-w-screen bg-blue-300 dark:bg-slate-900">
    <div class="grid grid-cols-1/6 md:grid-cols-4 lg:grid-cols-4 gap-2">
        <div class="w-fit pl-8 md:pl-16">
    	   <x-librarian-sidebar/>
        </div>
        <div class="mt-4">
            @include('ext.librarian-search-student')
        </div>
        <div class="mt-4">
            @include('ext.librarian-book-search')
        </div>
    </div>
</div>