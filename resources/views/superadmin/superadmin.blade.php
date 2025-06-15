@extends('layouts.superadmin')
@section('title', '| Superadmin Dashboard')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
@role('superadmin')
<div class="max-w-screen h-screen container">
    <div class="h-fit">
        <div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-4">
            <div class="borser-1 rounded-md shadow-sm px-3 py-4 my-4 mx-4">
                <header class="w-full font-semi-bold bg-gray-200 text-gray-700 py-5 px-6 rounded-top-md">
                    SUPERADMIN DASHBOARD
                </header>
                <div class="body w-full p-6">
                    This is some content
                </div>
            </div>
            <div class="borser-1 rounded-md shadow-sm px-3 py-4 my-4 mx-4">
                <header class="w-full font-semi-bold bg-gray-200 text-gray-700 py-5 px-6 rounded-top-md">
                    HELLO HEADER
                </header>
                <div class="body w-full p-6">
                    This is some content
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="bg-green-100 p-4 col-span-2">Item 1 (Spans two columns)</div>
            <div class="bg-green-100 p-4">Item 2</div>
            <div class="bg-green-100 p-4 row-span-2">Item 3 (Spans two rows)</div>
            <div class="bg-green-100 p-4">Item 4</div>
            <div class="bg-green-100 p-4">Item 5</div>
        </div>
    </div>
</div>
@endrole
</x-backend-main>
@endsection
