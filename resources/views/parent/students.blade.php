@extends('layouts.parent')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">My Children</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($parentChildren as $child)
                            <li>
                                <a href="{{route('parent.show.child',$child->id)}}">{{ $child->full_name}}</a>
                                 -
                                <a href="{{route('parent.child.stream',$child->stream->id)}}">
                                    {{ $child->stream->name }}
                                </a> 
                                 <a href="{{route('parent.show.child',$child->id)}}">
                                     <img style="margin-left: 2em" width="30" height="30" src="{{ $child->image_url }}">
                                 </a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
