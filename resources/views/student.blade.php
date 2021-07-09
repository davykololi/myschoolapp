@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Dashboard</div>
                    
                    <div class="panel-body">
                        You are logged in as a student! {{Auth::user()->first_name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
