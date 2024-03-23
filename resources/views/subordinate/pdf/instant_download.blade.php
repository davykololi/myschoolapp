@extends('layouts.pdf_notes_portrait')
@section('title', '| Staff Instant Pdf Download')

@section('content') 
    <div class="max-w-screen">
        <div style="margin-top: -70px; margin-right: 20px;">
            {!! $content !!}
        </div>
    </div>
@endsection
