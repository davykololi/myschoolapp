@if(Auth::user()->gender === "Male")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@elseif(Auth::user()->gender === "Female")
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->image }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
@else
<img class="rounded-full ring-4 ring-offset-4 ring-offset-black ring-blue-700 w-8 h-8 mr-6 dark:ring-slate-600" src="/storage/storage/{{Auth::user()->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
@endif