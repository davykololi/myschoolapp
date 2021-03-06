@extends('layouts.parent')
@section('title', '| Parent Change Password')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('parent.change-password.save') }}">
                        @include('ext._change_password')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection