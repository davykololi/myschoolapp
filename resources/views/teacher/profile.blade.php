<x-teacher>
    <!-- frontend-main view -->
    <x-frontend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h1 style="text-transform: uppercase;">My Profile</h1>
            <br/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ Auth::user()->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $teacher->salutation }} {{ $teacher->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            @if($teacher->headTeacher())
            {{ __('Head Teacher') }}
            @elseif($teacher->deputyHeadTeacher())
            {{ __('Deputy Head Teacher') }}
            @elseif($teacher->staffTeacher())
            {{ __('Staff Teacher') }}
            @elseif($teacher->classTeacher())
            {{ __('Class Teacher') }}
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $teacher->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID No.</strong>
            {{ $teacher->id_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Emp. No.:</strong>
            {{ $teacher->emp_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $teacher->getDob() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
             Years
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Designation:</strong>
            {{ $teacher->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Postal Address:</strong>
            {{ $teacher->address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.</strong>
            {{ $teacher->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subjects Assigned:</strong>
            @forelse($teacher->stream_subjects as $strmSubTeacher)
            <ul>
                <li><b>{{ $strmSubTeacher->subject->name }}</b> - <i>{{ $strmSubTeacher->stream->name }}</i>.</li>
            </ul>
            @empty
            <p style="color: red">The subject(s) have notyet been assigned to you.</p>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Departments:</strong>
            @forelse($teacher->departments as $dept)
                {{$dept->name}},
            @empty
            <span style="color: red">Notyet assigned to any department.</span>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Clubs:</strong>
            @forelse($teacher->clubs as $club)
                {{$club->name}},
            @empty
            <span style="color: red">You haven't joined any club.</span>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Meetings:</strong>
            <ol>
            @forelse($teacher->meetings as $meeting)
                <li>{{$meeting->name}} to be held on {{$meeting->getDate()}} at {{$meeting->venue}}. <span style="color: green">Agenda:</span> {{$meeting->agenda}}.</li>
            @empty
            <span style="color: red">Notyet assigned to any meeting(s) at the moment.</span>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</x-frontend-main>
</x-teacher>
