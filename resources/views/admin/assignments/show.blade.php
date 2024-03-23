@extends('layouts.admin')
@section('title', '| Assignment Details')

@section('content')
@role('admin')
@can('academicRegistrar')
  <!-- frontend-main view -->
  <x-backend-main>
        <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ASSIGNMENT DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.assignments.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $assignment->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Given To:</strong>
            @forelse($assignment->streams as $stream)
                {{$stream->name}},
            @empty
             <p>No assignment(s) yet.</p>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Given:</strong>
            {{ $assignment->date_given }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deadline:</strong>
            {{ $assignment->deadline }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Given By:</strong>
            @foreach($assignmentTeachers as $teacher)
                {{ $teacher->user->salutation }} {{ $teacher->user->full_name }}
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assignment File:</strong>
            <a href="{{route('admin.assignment.download',$assignment->id)}}">
                <x-pdf-svg/>
            </a>
        </div>
    </div>

    <div id="pspdfkit" style="height: 100vh"></div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($assignment->created_at)) }}
            </span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assignment Students:</strong>
            @foreach($assignmentStudents as $student)
                {{ $student->user->full_name }}
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assignment Subordinates:</strong>
            @foreach($assignmentSubordinates as $subordinate)
                {{ $subordinate->user->salutation }} {{ $subordinate->user->full_name }}
            @endforeach
        </div>
    </div>
</div>
</x-backend-main>

    <!-- PDF VIEWER SCRIPTS -->
    <script>
        PSPDFKit.load({
            container: "#pspdfkit",
            document: "/storage/files/16857-66499-1-PB_1689107340.pdf"; // Add the path to your document here.
        })
        .then(function(instance) {
            console.log("PSPDFKit loaded", instance);
        })
        .catch(function(error) {
            console.error(error.message);
        });
    </script>
@endcan
@endrole
@endsection









