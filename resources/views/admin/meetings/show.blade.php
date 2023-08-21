<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $meeting->name }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.meetings.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $meeting->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code:</strong>
            {{ $meeting->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {{\Carbon\Carbon::parse($meeting->date)->format('d-m-Y')}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Agenda:</strong>
            {{ $meeting->agenda }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Venue:</strong>
            {{ $meeting->venue }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Teachers:</strong>
            <ol>
            @forelse($meeting->teachers as $teacher)
                <li>{{ $teacher->title }} {{ $teacher->full_name }} {{ $teacher->phone_no }}</li>
            @empty
            <p>No teacher(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Students:</strong>
            <ol>
            @forelse($meeting->students as $student)
                <li>{{ $student->full_name }} {{ $student->stream->name }}</li>
            @empty
            <p>No student(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Subordinade Staff(s):</strong>
            <ol>
            @forelse($meeting->staffs as $staff)
                <li>{{ $staff->title }} {{ $staff->full_name }} {{ $staff->phone_no }}</li>
            @empty
            <p>No subordinade staff(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Class(es):</strong>
            <ol>
            @forelse($meeting->streams as $stream)
                <li>{{$stream->name}}</li>
            @empty
            <p>No class(es) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Club(s):</strong>
            <ol>
            @forelse($meeting->clubs as $club)
                <li>{{$club->name}}</li>
            @empty
            <p>No club(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($meeting->created_at)) }}</span>
        </div>
    </div>
    @include('meeting.attachteacherform')
    @include('meeting.attachstudentform')
    @include('meeting.attachstaffform')
    @include('meeting.attachstreamform')
</div>
</x-backend-main>
</x-admin>
