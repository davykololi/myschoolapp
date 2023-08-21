@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
<div>
        @include('partials.messages')
    <div >
        <div class="text-left">
            <h2 class="uppercase text-2xl text-green-800 font-extrabold">
                {{ $teacher->salutation }} {{ $teacher->first_name }}'s Profile
            </h2>
            <br/>
        </div>
        <div class="text-right">
            <a href="{{ url()->previous() }}">
                <button class="bg-green-800 text-yellow-500 px-4 border border-yellow-500 rounded-md items-center py-0.5">
                    Back
                </button>
            </a> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img class="w-24 h-24" src="/storage/storage/{{ $teacher->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $teacher->salutation }} {{ $teacher->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $teacher->role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $teacher->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $teacher->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            {!! $teacher->history !!}
        </div>
    </div>
</div>
  </x-frontend-main>
@endsection







