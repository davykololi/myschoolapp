@extends('layouts.admin')
@section('title', '| Add A Letter')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE LETTER</h5> 
                <a href="{{ route('admin.letters.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.letters.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" rows="5" cols="40" value="{!! old('content') !!}" id="summary-ckeditor"></textarea>
                        </div>
                    </div>
                    @include('ext._attach_schooldiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
