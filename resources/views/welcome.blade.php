@extends('layouts.frontend')
@section('title', '| Home')

@section('content')
    @include('shared.start_banner')
    @include('shared.about')
    @include('shared.categories')
    @include('shared.popular_courses')
    @include('shared.campus_story')
    @include('shared.portifolio')
    @include('shared.testimonials')
    @include('shared.events')
    @include('shared.registration')
    @include('shared.blog')
@endsection
