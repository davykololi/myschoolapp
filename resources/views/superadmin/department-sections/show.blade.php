@extends('layouts.superadmin')
@section('title', '| Department Section Details')

@section('content')
@role('superadmin')
<main class="container max-w-screen">
    <div class="row">
    @include('partials.messages')
    <div class="">
        <div class="mt-8">
            <h2 class="uppercase text-center text-2xl font-bold">{{ $deptSection->name }} Details</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Department Section Name:</strong>
            {{ $deptSection->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $deptSection->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code:</strong>
            {{ $deptSection->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $deptSection->name }} Departments:</strong>
            <ol>
            @forelse($deptSectionDepartments as $department)
                <li>{{ $department->name }}</li>
            @empty
            <p>No department(s) assigned to {{ $deptSection->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
