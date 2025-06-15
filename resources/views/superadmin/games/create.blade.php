@extends('layouts.superadmin')
@section('title', '| Add Game')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE GAME</h5> 
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right"><i class="fas fa-angle-double-left">Back</i></a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.games.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Game Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Game Name">
                        </div>
                    </div>
                    @include('ext._category_gamediv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
