@extends('layouts.admin')
@section('title', '| School Events List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
 <div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="w-full text-center">
            <h2 class="text-center my-4 border-bottom pb-3 uppercase">{{ Auth::user()->school->name }} Calendar Events</h2>
            <div id='calendar' class="bg-stone-500 p-4 md:w-[600px] md:h-auto rounded mx-auto dark:bg-gray-800"></div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection

