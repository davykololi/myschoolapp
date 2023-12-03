@extends('layouts.staff')
@section('title', '| Instant Pdf Generation')

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
    <div class="w-full">
            <div>
                <h5 class="uppercase text-center text-2xl font-hairline">INSTANT PDF GENERATION</h5> 
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="text-center mt-8 uppercase">
                @include('partials.errors')
            </div>
            <div class="card-body">
                <form action="{{ route('staff.instant.download',Auth::user()->school->id) }}" method="get" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <h3>ATTENTION!!! ENSURE YOU SCAN THE QR CODE AND SAVE SCANNED CODE FOR REFERENCE</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="content" id="summary-ckeditor" rows="10" cols="70" class="prose"></textarea>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
    </div>   
  </x-frontend-main>
@endsection







