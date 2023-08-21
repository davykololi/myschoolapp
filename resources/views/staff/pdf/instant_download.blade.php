@extends('layouts.pdf_portrait')
@section('title', '| Staff Instant Pdf Download')

@section('content') 
    <div class="max-w-screen">
        <div class="flex-row">
            <div class="lg:prose">
                {!! $content !!}
            </div>
        </div>
    </div>
@endsection
