@auth <!-- Start Authorized User -->
@if(Auth::user()->hasRole('accountant') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->accountant->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('accountant') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->accountant->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('admin') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->admin->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('admin') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->admin->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('librarian') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->librarian->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('librarian') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->librarian->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('student') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->student->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('student') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->student->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('matron') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->matron->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('matron') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->matron->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('superadmin') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->superadmin->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('superadmin') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->superadmin->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif

@if(Auth::user()->hasRole('teacher') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->teacher->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('teacher') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->teacher->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif

@if(Auth::user()->hasRole('parent') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->parent->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('parent') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->parent->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif

@if(Auth::user()->hasRole('subordinate') && Auth::user()->gender === "Male")
<img src="/storage/storage/{{Auth::user()->subordinate->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('subordinate') && Auth::user()->gender === "Female")
<img src="/storage/storage/{{Auth::user()->subordinate->image }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ Auth::user()->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif
@endauth <!-- End Authorized User -->

