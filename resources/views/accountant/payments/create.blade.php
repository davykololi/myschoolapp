@extends('layouts.accountant')
@section('title', '| Add Payment')

@section('content')
<x-frontend-main>
<div class="max-w-screen bg-blue-300 md:px-16 lg:px-16 py-8 shadow-lg dark:bg-slate-900 dark:text-slate-400">
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE PAYMENT</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="text-center">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div class="card-body">
                <form action="{{ route('accountant.payments.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="w-full flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Payment Title</label>
                            <div class="flex-1">
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Payment Description</label>
                            <div class="flex-1">
                                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" placeholder="Description">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Payment Amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount') }}" placeholder="Amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Refrence Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="ref_no" id="ref_no" class="form-control" value="{{ old('ref_no') }}" placeholder="Reference Number">
                        </div>
                    </div>
                    @include('ext._attach_yeardiv')
                    @include('ext._attach_termdiv')
                    @include('ext._attach_classdiv')
                    @include('ext._get_streams_ids')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
