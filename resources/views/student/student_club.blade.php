@extends('layouts.student')

@section('title')
    {{ $title }}
@endsection

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $club->name }} Details.</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('student.profile') }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label style="text-transform: uppercase;">{{ $club->name }} students</label>
        <ol>
        @forelse($club->students as $student)
            <li>{{ $student->full_name }}</li>
        @empty
            <p style="color: red">No students assigned to this club yet.</p>
        @endforelse
        </ol>
        </div>

        <div class="form-group">
            <label style="text-transform: uppercase;">{{ $club->name }} Teachers</label>
        <ol>
        @forelse($club->teachers as $teacher)
            <li>{{ $teacher->full_name }}</li>
        @empty
            <p style="color: red">No teacher(s) assigned to this club yet.</p>
        @endforelse
        </ol>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
