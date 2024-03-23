@auth <!-- Start of Authorized User -->
@if(Auth::user()->hasRole('accountant'))
<div><x-accountant-sidebar/></div>
@endif

@if(Auth::user()->hasRole('admin'))
<div><x-admin-sidebar/></div>
@endif

@if(Auth::user()->hasRole('superadmin'))
<div><x-superadmin-sidebar/></div>
@endif

@if(Auth::user()->hasRole('teacher'))
<div><x-teacher-sidebar/></div>
@endif

@if(Auth::user()->hasRole('student'))
<div><x-student-sidebar/></div>
@endif

@if(Auth::user()->hasRole('librarian'))
<div><x-librarian-sidebar/></div>
@endif

@if(Auth::user()->hasRole('subordinate'))
<div><x-subordinate-sidebar/></div>
@endif

@if(Auth::user()->hasRole('parent'))
<div><x-parent-sidebar/></div>
@endif

@if(Auth::user()->hasRole('matron'))
<div><x-matron-sidebar/></div>
@endif
@endauth <!-- End of Authorized User -->

