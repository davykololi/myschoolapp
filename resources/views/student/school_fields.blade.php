@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
        <div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
            <div class="w-full">
                <div class="mx-2 md:mx-8 lg:mx-8">
                    <div>
                        <h1 class="uppercase text-left font-extrabold mb-4">School Fields</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($fields as $key => $field)
                            <li>
                                {{ $field->name }} <span class="text-green-800">Category:</span> {{ $field->category_field->name }} 
                            </li>
                            @empty
                            <div class="bg-red-700 text-white text-center px-1 px-2 rounded-md">
                                {{ strtoupper($user->school->name) }} {{ strtoupper(__('FIELDS NOTYET POPULATED')) }}.
                            </div>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
  </x-frontend-main>
@endsection




