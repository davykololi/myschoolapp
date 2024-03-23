@extends('layouts.accountant')
@section('title', '| Accountant Dashboard')

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
@role('accountant')
<div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8">
            <div class="">
                <div class="">
                    <div class="text-center text-2xl uppercase font-bold">Accountant Dashboard</div>
 
                    <div class="text-center text-lg font-bold uppercase">
                        You are logged in as {{ Auth::user()->accountant->position->value }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
</x-frontend-main>
@endsection
