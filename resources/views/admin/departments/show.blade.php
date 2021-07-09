@extends('layouts.admin')
@section('title', '| Show Department')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $department->name }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{route('admin.dept.teachers',$department->id)}}" class="btn btn-primary btn-border">
                {{ $department->name }} Teachers PDF
            </a>
            <br/>
            <a href="{{ route('admin.departments.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $department->name }}, {{ $department->school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code:</strong>
            {{ $department->code }}
        </div>
    </div>
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
                <li>{{ $meeting->name }} Date: {{ \Carbon\Carbon::parse($meeting->date)->format('d-m-Y') }}, 
                    Agenda: {{ $meeting->agenda }}
                </li>
            @empty
            <p style="color: red">No meeting(s) assigned yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $department->name }} Teachers:</strong>
            <ol>
            @forelse($department->teachers as $teacher)
                <li>{{ $teacher->title }} {{ $teacher->full_name }} {{ $teacher->phone_no }}</li>
            @empty
            <p style="color: red">No teachers(s) assigned yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $department->name }} Substaffs:</strong>
            <ol>
            @forelse($department->staffs as $staff)
                <li>{{ $staff->title }} {{ $staff->full_name }} {{ $staff->phone_no }}</li>
            @empty
            <p style="color: red">No substaff(s) assigned yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($department->created_at)) }}</span>
        </div>
    </div>
    @include('department.attachteacherform')
    @include('department.detachteacherform')
    @include('department.attachstaffform')
    @include('department.detachstaffform')
    @include('department.attachmeetingform')
    @include('department.detachmeetingform')
</div>
</main>
@endsection
