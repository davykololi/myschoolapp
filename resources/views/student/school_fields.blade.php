@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
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
                            <p class="text-[red]">{{$user->school->name}} has no fields.</p>
                            @endforelse
                        </ol>
                    </div>
  </x-frontend-main>
@endsection




