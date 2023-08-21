@extends('layouts.librarian')
@section('title', '| Edit Issued Book')

@section('content')
<x-frontend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit <a href="{{ route('librarian.bookers.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('librarian.bookers.update', $booker->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
        				<label class="control-label col-sm-2" >Attach Student</label>
        				<div class="col-md-10">
            				<select id="student" type="student" value="{{old('student')}}" class="leading-tight" name="student">
                				<option value="">Select Student</option>
                				@foreach ($students as $student)
                				<option value="{{$student->id}}" @if($booker->student_id == $student->id) selected @endif>
                					{{$student->full_name}}
                				</option>
                				@endforeach
            				</select>

            				@if($errors->has('student'))
            					<span class="help-block">
                					<strong>{{$errors->first('student')}}</strong>
            					</span>
            				@endif
        				</div>
    				</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Book</label>
                        <div class="col-md-10">
                            <select id="book" type="book" value="{{old('book')}}" class="form-control" name="book">
                                <option value="">Select Book</option>
                                @foreach ($books as $book)
                                    <option value="{{$book->id}}" @if($booker->book_id == $book->id) selected @endif>
                                    	{{$book->title}}
                                    </option>
                                @endforeach
                            </select>

                            @if($errors->has('book'))
                                <span class="help-block">
                                    <strong>{{$errors->first('book')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Serial No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="serial_no" id="serial_no" class="form-control" value="{{$booker->serial_no}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Issued Date</label>
                        <div class="col-sm-10">
                            <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                <input type="text" name="issued_date" id="issued_date" class="form-control" value="{{$booker->issued_date}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Return Date</label>
                        <div class="col-sm-10">
                            <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                <input type="text" name="return_date" id="return_date" class="form-control" value="{{$booker->return_date}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Book Returned?</label>
                        <div class="col-sm-10">
                            <input type="text" name="returned" id="returned" class="form-control" value="{{$booker->returned ? 'Yes':'No' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Status Returned?</label>
                        <div class="col-sm-10">
                            <input type="text" name="status_returned" id="status_returned" class="form-control" value="{{$booker->returned_status ? 'Good':'Poor'}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Recommentation</label>
                        <div class="col-sm-10">
                            <input type="text" name="recommentation" id="recommentation" class="form-control" value="{{$booker->recommentation}}">
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
