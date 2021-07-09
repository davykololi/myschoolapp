@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">School Fields</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($fields as $key => $field)
                            <li>
                                {{ $field->name }} <span style="color: green">Category:</span> {{ $field->category_field->name }} 
                            </li>
                            @empty
                            <p style="color: red">{{$user->school->name}} has no fields.</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
