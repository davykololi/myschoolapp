@extends('layouts.parent')

@section('title')
    {{ __('Children To') }} {{ Auth::user()->salutation }} {{ Auth::user()->full_name }}
@endsection
 
@section('content')
@role('parent')
<x-frontend-main>
    <div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
        <div class="w-full">
            <div class="mx-2 md:mx-8 lg:mx-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">My Children</h1>
                    </div>
                    @include('partials.errors')
                    <div class="panel-body">
                        <ol>
                            @foreach($parentChildren as $child)
                            <li>
                                <a href="{{route('parent.show.child',$child->id)}}">{{ $child->user->full_name}}</a>
                                 -
                                <a href="{{route('parent.child.stream',$child->stream->id)}}">
                                    {{ $child->stream->name }}
                                </a> 
                                 <a href="{{route('parent.show.child',[ 'child' => $child->id])}}">
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
</x-frontend-main>
@endrole
@endsection
