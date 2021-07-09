@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">School Halls</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($halls as $key => $hall)
                            <li>
                                {{ $hall->name }} <span style="color: green">Category:</span> {{ $hall->category_hall->name }} 
                            </li>
                            @empty
                            <p style="color: red">{{$user->school->name}} has no halls.</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
