@extends('layouts.teacher')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Teacher Dashboard</div>

                    <div class="panel-body">
                        You are logged in as a Teacher! Welcome {{Auth::user()->first_name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
