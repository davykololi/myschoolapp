@extends('layouts.matron')
@section('title', '| Matron Dashboard')

@section('content')
@role('matron')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="">
                <div>
                    <h2 class="text-center text-2xl font-bold uppercase">Matron Dashboard</h2>
 
                    <div class="">
                        You are logged in as a matron with {{ Auth::user()->matron->position->value }} position!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
