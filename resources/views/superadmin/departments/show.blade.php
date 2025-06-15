@extends('layouts.superadmin')
@section('title', '| Deparment Details')

@section('content')
@role('superadmin')
<x-backend-main>
<div class="max-w-screen mx-2 md:mx-16 mb-8">
    <div class="w-full">
        <div>
            <div>
                <div>
                    <h2 class="uppercase text-center text-2xl font-bold">{{ $department->name }} Details</h2>
                </div>
                <div class="text-center mt-8">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
                <div class="pull-right">
                    <a href="{{ url()->previous() }}" class="label label-primary pull-right"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
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
                    @forelse($deptTeachers as $teacher)
                    <a href="{{route('superadmin.teachers.show',$teacher->id)}}">
                        <li>
                            {{ $teacher->user->salutation }} {{ $teacher->user->full_name }} - {{ $teacher->phone_no }} {{ $teacher->user->email }}
                        </li>
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
                    @forelse($deptSubordinates as $subordinate)
                    <a href="{{route('superadmin.subordinates.show',$subordinate->id)}}">
                        <li>{{ $subordinate->user->salutation }} {{ $subordinate->user->full_name }} - {{ $subordinate->phone_no }}</li>
                    </a>
                    @empty
                    <p style="color: red">No substaff(s) assigned to {{ $department->name }} yet.</p>
                    @endforelse
                    </ol>
                </div>
            </div>

            <div class="flex flex-col md:flex-row lg:flex-row gap-4 mt-4">
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="flex flex-col">
                        <label class="uppercase mb-2" for="teachers">{{ __('Attach Teachers') }}</label>
                        @include('superadmin.department.attach_teacher_form')
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="flex flex-col">
                        <label class="uppercase mb-2" for="staffs">{{ __('Detach Teachers') }}</label>
                        @include('superadmin.department.detach_teacher_form')
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row lg:flex-row gap-4 mt-4">
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="flex flex-col">
                        <label class="uppercase mb-2" for="teachers">{{ __('Attach Sub Staffs') }}</label>
                        @include('superadmin.department.attach_subordinate_form')
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="flex flex-col">
                        <label class="uppercase mb-2" for="staffs">{{ __('Detach Sub Staffs') }}</label>
                        @include('superadmin.department.detach_subordinate_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
