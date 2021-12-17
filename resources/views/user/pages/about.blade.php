@extends('layouts.frontend')
@section('title', '| About Us')

@section('content')
    @include('breadcrumbs.aboutpage_breadcrumb')
    @include('shared.about')
    @include('shared.campus_story')
    @include('shared.advisor')
    @include('shared.portifolio')
@endsection
