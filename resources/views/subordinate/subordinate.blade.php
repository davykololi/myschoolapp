@extends('layouts.subordinate')
@section('title', '| Subordinate Staff Dashboard')
 
@section('content')
@role('subordinate')
<x-frontend-main>
<div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="mt-4">
                <div class="">
                    <h2 class="text-center text-2xl font-bold uppercase">Sub-Staff Dashboard</h2>

                    <div class="panel-body">
                        You are logged in as Sub-Staff! with
                        {{ Auth::user()->subordinate->position->value }} position
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
