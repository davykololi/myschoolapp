@extends('layouts.matron')
@section('title', '| Dormitory')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h1 style="text-transform: uppercase;">{{ $dormitory->name }} Dormitory</h1>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('matron.dormitories',$dormitory->school->id) }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bed No.:</strong>
            {{ $dormitory->bed_no }} Beds.
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory Head:</strong>
            {{ $dormitory->dom_head }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory Students:</strong>
            <ol>
            @forelse($dormitoryStudents as $student)
                <li>
                    {{ $student->full_name }} Class: {{ $student->stream->name }} 
                    <img style="margin-left: 2em" width="30" height="30" src="/storage/storage/{{ $student->image }}">
                </li>
            @empty
            <p>No students assigned to {{ $dormitory->name }} Dormitory yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory Meetings:</strong>
            <ol>
            @forelse($dormitory->meetings as $meeting)
                <li>{{ $meeting->name }} Date: {{ $meeting->date }} Agenda: {{ $meeting->agenda }}</li>
            @empty
            <p>No meeting(s) assigned yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endsection
