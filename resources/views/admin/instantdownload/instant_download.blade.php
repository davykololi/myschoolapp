@extends('layouts.admin')
@section('title', '| Admin Instant Pdf Generation')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
    <div>
        <div>
            <div>
                <h5 class="uppercase text-center text-2xl font-hairline">INSTANT PDF GENERATION</h5> 
                <div>
                    <x-button class="back-button">
                        <x-back-svg-n-url/>
                    </x-button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.instant.download',Auth::user()->school->id) }}" method="get" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="content" id="summary-ckeditor" rows="10" cols="70" class="prose"></textarea>
                        </div>
                    </div>
                    <div class="w-full">
                    <div class="mt-4">
                        <x-button class="generate-button">GENERATE</x-button>
                    </div>
            </div>
                </form>
            </div>
        </div>
    </div>
</x-backend-main> 
@endrole
@endsection







