@extends('layouts.admin')
@section('title', '| Create Pdf')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.errors')
            <div class="justify-center items-center">
                <h2 class="admin-h2">DESIGN, SAVE & COVERT TO PDF</h2>
            </div>
            <div><a href="{{ route('admin.pdf-generators.index') }}" class="btn btn-primary pull-right">Back</a></div>
            <div>
                <form action="{{ route('admin.pdf-generators.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-12">
                            <textarea name="content" rows="5" cols="60" value="{!! old('content') !!}" id="summary-ckeditor"></textarea>
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
