@extends('layouts.librarian')
@section('title', '| Librararian Dashboard')
 
@section('content')
<x-frontend-main>
@role('librarian')
<div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <div class="items-center justify-center">
                    <div class="text-center text-2xl font-bold uppercase">Librarian Dashboard</div>
 
                    <div class="mt-4">
                        You are logged in as a librarian!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
</x-frontend-main>
@endsection
