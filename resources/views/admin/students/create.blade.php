@extends('layouts.admin')
@section('title', 'Add Student')
@section('content')
        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 class="card-title">STUDENT ADMISSION FORM</h6>
            </div>
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ route('admin.students.index') }}" class="btn btn-primary pull-right">Back</a>
                </div>
            </div>
            
            <form id="ajax-reg" method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="{{ route('admin.students.store') }}" data-fouc>
               @csrf
                <h6>Personal data</h6>
                <fieldset>
                    @include('ext._first_common_detailsdiv')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._blood_group_div')
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h6>Student Data</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Class: <span class="text-danger">*</span></label>
                                @include('ext._attach_streamdiv')
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Intake: <span class="text-danger">*</span></label>
                                @include('ext._attach_intakediv')
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year_admitted">Admission Date: <span class="text-danger">*</span></label>
                                <input type="text" name="doa" id="datetimepicker" class="form-control">
                                @error('doa')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Admission Number:</label>
                                <input type="text" name="admission_no" placeholder="Admission Number" class="form-control" value="{{ old('admission_no') }}">
                                @error('admission_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_role">Student Role At School: </label>
                                @include('ext._attach_student_rolediv')
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my_parent_id">Parent: </label>
                                @include('ext._attach_parentdiv')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dorm_id">Dormitory: </label>
                                @include('ext._attach_dormitorydiv')
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dormitory Room No:</label>
                                <input type="text" name="dorm_room_no" placeholder="Dormitory Room No" class="form-control" value="{{ old('dorm_room_no') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sport House:</label>
                                <input type="text" name="house" placeholder="Sport House" class="form-control" value="{{ old('house') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>More Information:</label>
                                @include('ext._content_div')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('ext._passworddiv')
                    </div>
                    @include('ext._submit_register_button')
                </fieldset>
            </form>
        </div>
    @endsection
