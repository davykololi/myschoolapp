@extends('layouts.pdf_portrait')
@section('title', '| Instant Pdf')

@section('content') 
    <div class="max-w-screen">
        <div class="flex-row">
            <div class="lg:prose">
                {!! $content !!}
            </div>
        </div>
    </div>
@endsection
