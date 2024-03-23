@auth <!-- Start Authorized User -->
@if(Auth::user()->hasRole('accountant') && Auth::user()->accountant->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->accountant->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('accountant') && Auth::user()->accountant->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->accountant->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('admin') && Auth::user()->admin->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->admin->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('admin') && Auth::user()->admin->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->admin->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('librarian') && Auth::user()->librarian->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->librarian->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('librarian') && Auth::user()->librarian->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->librarian->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('student') && Auth::user()->student->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->student->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('student') && Auth::user()->student->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->student->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('matron') && Auth::user()->matron->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->matron->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('matron') && Auth::user()->matron->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->matron->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif


@if(Auth::user()->hasRole('superadmin') && Auth::user()->superadmin->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->superadmin->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('superadmin') && Auth::user()->superadmin->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->superadmin->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif

@if(Auth::user()->hasRole('teacher') && Auth::user()->teacher->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->teacher->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('teacher') && Auth::user()->teacher->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->teacher->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif

@if(Auth::user()->hasRole('parent') && Auth::user()->parent->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->parent->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('parent') && Auth::user()->parent->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->parent->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif

@if(Auth::user()->hasRole('subordinate') && Auth::user()->subordinate->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->subordinate->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->hasRole('subordinate') && Auth::user()->subordinate->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->subordinate->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@endif
@endauth <!-- End Authorized User -->

@guest
<span class="text-white font-bold">{{ __('LOGIN') }}</span>
@endguest
