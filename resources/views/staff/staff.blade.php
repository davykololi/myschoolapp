@extends('layouts.staff')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sub-Staff Dashboard</div>

                    <div class="panel-body">
                        You are logged in as Sub-Staff! with
                        @if(Auth::user()->schoolSecretary())
                        {{ __('School Secretary Role') }}
                        @else
                        {{ __('No Role') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
