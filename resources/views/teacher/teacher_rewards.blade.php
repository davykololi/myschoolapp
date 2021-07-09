@extends('layouts.teacher')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="text-transform: uppercase;">{{$user->title}} {{$user->last_name}}'s Awards</h3>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($user->rewards as $reward)
                            <li>
                                {{$reward->name}} Purpose: {{$reward->purpose}}
                            </li>
                            @empty
                            <p style="color: red">You have not recieved any award. Work hard for one!!</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
