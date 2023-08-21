@extends('layouts.accountant')
 
@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
    <div class="container h-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Accountant Dashboard</div>
 
                    <div class="panel-body">
                        You are logged in as an accountant!
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend-main>
@endsection
