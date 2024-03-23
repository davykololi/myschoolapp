@extends('layouts.parent')
@section('title', '| Parent Dashboard')
 
@section('content')
@role('parent')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="">
                <div class="">
                    <div class="text-center text-2xl font-bold uppercase mt-4">Parent Dashboard</div>
 
                    <div class="mt-4">
                        You are logged in as a parent!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
