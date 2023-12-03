@extends('layouts.pdf_portrait')
@section('title', '| School Pdf Notes')

@section('content')
<div class="container">
    <div style="margin-top: -70px; margin-right: 20px;">
        {!! $letter->content !!}
    </div>
</div>
@endsection
