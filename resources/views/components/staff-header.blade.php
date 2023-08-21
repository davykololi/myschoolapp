@can('schoolSecretary')
<div class="max-w-screen bg-blue-300 text-black dark:bg-slate-900 dark:text-slate-600">
	<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2">
		<div class="w-full px-2 md:px-4 lg:px-4 py-2">
            @include('ext.staff-search-student')
        </div>
        <div class="w-full px-2 md:px-4 lg:px-4 py-2">
            <div id="digitalclock"></div>
        </div>
	</div>
</div>
@endcan