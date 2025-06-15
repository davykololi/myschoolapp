@extends('layouts.superadmin')
@section('title', '| Class Details')

@section('content')
@role('superadmin')
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>CLASS DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="label label-primary pull-right"> Back</a>
        </div>
        <div>
            <p>{{ ucfirst($class->name) }} has {{ $classStudents }} students. {{ $males }} males and {{ $females }} females.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $class->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $class->desc }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Form one streams:</strong>
            <ul>
            @if(!empty($class->streams))
            @forelse($class->streams as $st)
                <li><a href="{{ route('superadmin.streams.show',$st->id) }}">{{ $st->name }}</a></li>    
            @empty
                <p class="text-danger">This {{ $class->name }} has no streams currently.</p>
            @endforelse
            @endif
            </ul>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($class->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
@endrole 
@endsection
