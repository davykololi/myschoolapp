@extends('layouts.pdf_portrait')
@section('title', '| Instant Pdf')

@section('content') 
    <div class="max-w-screen">
        <div class="flex-row">
            <div class="lg:prose" style="margin-top: -55px;">
                {!! $content !!}
            </div>
        </div>
    </div>
@endsection
