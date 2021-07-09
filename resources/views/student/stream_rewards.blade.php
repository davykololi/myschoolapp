@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{$user->stream->name}} Awards</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($user->stream->rewards as $reward)
                            <li>
                                {{ $reward->name }}. <span style="color: green">Purpose:</span> {{ $reward->purpose }}.
                            @empty
                            <p style="color: red">{{$user->stream->name}} has notyet recieved any award. Work hard!!</p>
                            </li>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
