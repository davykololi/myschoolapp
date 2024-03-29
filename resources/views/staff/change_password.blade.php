@extends('layouts.staff')
@section('title', '| Sub Staff Change Password')

@section('content')
<x-change-password-main>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('staff.change-password.save') }}">
                        @include('ext._change_password')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-change-password-main>
@endsection