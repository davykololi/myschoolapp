@extends('layouts.superadmin')
@section('title', '| Show Department')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="w-full">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $department->name }} Details</h2>
        </div>
        <div class="text-center mt-8">
            @include('partials.messages')
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="label label-primary pull-right"> Back</a>
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
            <strong>{{ $department->name }} Teachers:</strong>
            <ol>
            @forelse($department->teachers as $teacher)
            <a href="{{route('superadmin.teachers.show',$teacher->id)}}">
                <li>{{ $teacher->title }} {{ $teacher->full_name }} - {{ $teacher->phone_no }} {{ $teacher->email }}</li>
            </a>
            @empty
            <p style="color: red">No teachers(s) assigned to {{ $department->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $department->name }} Substaffs:</strong>
            <ol>
            @forelse($department->staffs as $staff)
            <a href="{{route('superadmin.staffs.show',$staff->id)}}">
                <li>{{ $staff->title }} {{ $staff->full_name }} - {{ $staff->phone_no }}</li>
            </a>
            @empty
            <p style="color: red">No substaff(s) assigned to {{ $department->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>

    <div class="flex flex-col md:flex-row lg:flex-row">
        <div class="w-full md:w-1/3 lg:w-1/3">
            <div class="flex flex-col">
                <label class="uppercase mb-2" for="teachers">{{ __('Attach Teachers') }}</label>
                @include('department.attachteacherform')
            </div>
        </div>
        <div class="w-full md:w-1/3 lg:w-1/3">
            <div class="flex flex-col">
                <label class="uppercase mb-2" for="staffs">{{ __('Attach Sub Staffs') }}</label>
                @include('department.attachstaffform')
            </div>
        </div>
    </div>
</div>
</main>
@endsection
