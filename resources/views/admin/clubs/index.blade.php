@extends('layouts.admin')
@section('title', '| All Clubs')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($clubs))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>CLUBS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.clubs.create')}}"> Add Club</a>
                    <a href="{{route('admin.school.clubs', Auth::user()->school->id)}}" class="btn btn-primary btn-border">Clubs PDF</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.clubhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($clubs as $club)
                        <tr>
                            <td class="table-text">
                                <div>{{$club->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$club->code}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$club->regDate()}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.clubs.destroy',$club->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.clubs.show', $club->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.clubs.edit', $club->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$club->name}}?')">
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
