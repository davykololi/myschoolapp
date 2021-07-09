@extends('layouts.librarian')
@section('title', '| Librarian Show Library')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{$library->name}} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('librarian.school.libraries') }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label style="text-transform: uppercase;">{{ $library->name }} Meetings</label>
            <ol>
            @forelse($library->meetings as $meeting)
                <li>
                    {{ $meeting->name }} Date: {{ $meeting->getDate() }}. <span style="color: green">Agenda:</span> {{ $meeting->agenda }}
                </li>
            @empty
                <p>No meeting(s) assigned to {{$library->name}} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endsection
