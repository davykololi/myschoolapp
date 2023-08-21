@extends('layouts.pdf_portrait')
@section('title', '| School Letters')

@section('content')
<div class="container">
    <div class="row">
        <div>
            <p style="margin-top: -20px">{!! $letter->content !!}</p>
        </div>
    </div>
<
@endsection
