@extends('layouts.matron')
@section('title', '| Matron Profile')

@section('content')
@role('matron')
<x-frontend-main>
<div class="max-w-screen pb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="row">
                <div>
                    <div>
                        <h2 style="text-transform: uppercase;">My Profile</h2>
                        <br/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <x-user-profile-avatar/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->salutation }} {{ $user->full_name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Position:</strong>
                        {{$user->matron->position->value }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DOB:</strong>
                        {{ $user->matron->dob }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Age:</strong>
                        {{ $user->matron->age }} years.
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Current Address:</strong>
                        {{ $user->matron->current_address }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permanent Address:</strong>
                        {{ $user->matron->permanent_address }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>History</strong>
                        {!! $user->matron->history !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
