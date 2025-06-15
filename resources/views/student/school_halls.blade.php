@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')  
  <!-- frontend-main view -->
  <x-frontend-main>
                    <div>
                        <h1 class="uppercase text-left font-extrabold mb-4">School Halls</h1>
                    </div>
                    <div>
                        <ol>
                            @forelse($halls as $key => $hall)
                            <li>
                                {{ $hall->name }} <span class="text-green-800">Category:</span> {{ $hall->category_hall->name }} 
                            </li>
                            @empty
                            <p class="bg-red-700 text-white text-center px-1 px-2 rounded-md">
                                {{ strtoupper($user->school->name) }} {{ strtoupper(__('HALLS NOTYET POPULATED')) }}.
                            </p>
                            @endforelse
                        </ol>
                    </div>
  </x-frontend-main>
@endsection





