@extends('layouts.pdf_notes_portrait')
@section('title', '| Generated Pdf Document')

@section('content')
<div class="container">
    <div style="margin-top: -70px; margin-right: 20px;margin-bottom: 20px !important;">
        {!! $pdfGenerator->content !!}
    </div>
</div>
@endsection
