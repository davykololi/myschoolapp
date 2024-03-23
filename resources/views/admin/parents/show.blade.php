@extends('layouts.admin')
@section('title', '| Parent Details')

@section('content')
@role('admin')
@can('studentRegistrar')
<x-backend-main>
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>PARENT DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.parents.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $myParent->image }}" alt="{{$myParent->name }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $myParent->user->salutation }} {{ $myParent->user->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $myParent->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $myParent->user->email }} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Children To {{ $myParent->user->salutation }} {{ $myParent->user->full_name }}</strong>
            <ol>
                @if(!is_null($parentChildren))
                @foreach($parentChildren as $child)
                <li>
                    {{$child->user->full_name}} <span style="color: green">Class</span> {{$child->stream->name}}
                </li>
                @endforeach
                @endif
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($myParent->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
@endcan
@endrole
@endsection
