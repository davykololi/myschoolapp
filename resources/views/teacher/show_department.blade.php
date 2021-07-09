@extends('layouts.teacher')
@section('title', '| Department Details')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $department->name }}</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('teacher.departments') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $department->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Head:</strong>
            {{ $department->head_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assitant Head:</strong>
            {{ $department->asshead_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Motto:</strong>
            {{ $department->motto }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vision:</strong>
            {{ $department->vision }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $department->name }} Meetings:</strong>
            <ol>
            @forelse($department->meetings as $meeting)
                <li>{{ $meeting->name }} on {{ \Carbon\Carbon::parse($meeting->date)->format('d-m-Y') }}. Agenda: {{ $meeting->agenda }}</li>
            @empty
            <p style="color: red">No meeting(s) assigned to {{ $department->name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $department->name }} Teachers:</strong>
            <ol>
            @forelse($department->teachers as $teacher)
                <li>
                    <a href="{{route('teacher.show',$teacher->id)}}">
                    	{{ $teacher->title }} {{ $teacher->full_name }} {{ $teacher->phone_no }} 
                    	<span style="color: blue">{{ $teacher->email }}</span>
                    </a>      
                </li>
            @empty
            <p style="color: red">No teachers(s) assigned to {{ $department->name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $department->name }} Subordinade Staff(s):</strong>
            <ol>
            @forelse($department->staffs as $staff)
                <li>{{ $staff->title }} {{ $staff->full_name }} {{ $staff->phone_no }} 
                    <span style="color: blue">{{ $staff->email }}</span>
                </li>
            @empty
            <p style="color: red">No subordinade staff(s) assigned to {{ $department->name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endsection
