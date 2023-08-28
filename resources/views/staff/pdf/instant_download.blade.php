@extends('layouts.pdf_portrait')
@section('title', '| Staff Instant Pdf Download')

@section('content') 
    <div class="max-w-screen">
        <div class="row">
            <div class="col-md-12" style="margin-top: -60px;">
                {!! $content !!}
            </div>
        </div>
    </div>
@endsection
