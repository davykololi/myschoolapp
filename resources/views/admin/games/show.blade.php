@extends('layouts.admin')
@section('title', '| Show Game')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $game->name }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.games.index') }}" class="btn btn-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Game Name:</strong>
            {{ $game->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category</strong>
            {{ $game->category_game->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Game Code:</strong>
            {{ $game->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($game->created_at)) }}
            </span>
        </div>
    </div>
</div>
</main>
@endsection
