@extends('layouts.admin')
@section('title', '| All Games')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($games))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>GAMES LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.games.create')}}"> Add Game</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.gamehead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($games as $key => $game)
                        <tr>
                            <td class="table-text">
                                <div>{{$game->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$game->code}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$game->category_game->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.games.destroy',$game->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.games.show', $game->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
