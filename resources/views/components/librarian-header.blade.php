<div class="max-w-screen bg-blue-300 dark:bg-slate-900">
    <x-librarian-sidebar/>
    <div class="grid grid-cols-1/6 md:grid-cols-4 lg:grid-cols-4 gap-2 mx-4 md:mx-24">
        <div class="mt-4">
            @include('ext.librarian-book-search')
        </div>
        <div class="mt-4">
            @include('ext.librarian-bookauthor-search')
        </div>
    </div>
</div>