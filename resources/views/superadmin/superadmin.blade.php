@extends('layouts.superadmin')
@section('title', '| Superadmin Dashboard')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
    @role('superadmin')
    <div class="container h-screen">
        <div class="w-full px-8">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 class="text-center uppercase font-bold text-2xl underline font-Oswald">Superadmin Dashboard</h1>
 
                    <div class="panel-body">
                        You are logged in as Superadmin!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-backend-main>
@endsection
