@extends('layouts.matron')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">Dormitories</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($dormitories as $dormitory)
                            <li>
                                <a href="{{route('matron.dormitory',$dormitory->id)}}">{{ $dormitory->name}}</a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
