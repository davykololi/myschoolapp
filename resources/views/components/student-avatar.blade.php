@if($student->gender === "Male")
<img class="rounded-full ring-2 ring-gray-700 dark:ring-[#32302f] w-8 h-8 mr-6 md:hover:scale-150" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'" alt="{{ $student->user->full_name  }}" loading="lazy">
@endif

@if($student->gender === "Female")
<img class="rounded-full ring-2 ring-gray-700 dark:ring-[#32302f] w-8 h-8 mr-6 md:hover:scale-150" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/female_avatar.png')}}'" alt="{{ $student->user->full_name  }}" loading="lazy">
@endif