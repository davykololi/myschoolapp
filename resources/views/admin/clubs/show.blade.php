<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $club->name }} Details</h2>
            <br/>
        </div>
        <div style="text-align: center;">
            @include('partials.errors')
        </div>
        <div class="flex flex-row">
            <div class="flex flex-col">
                <label>Students</label>
                <a href="{{route('admin.club.students',$club->id)}}" class="pdf w-fit">
                     <x-pdf-svg/>
                </a>
            </div>
            <div class="flex flex-col mx-2">
                <label>Teachers</label>
                <a href="{{route('admin.club.teachers',$club->id)}}" class="pdf w-fit">
                    <x-pdf-svg/>
                </a>
            <br/>
            <a href="{{ url()->previous() }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Club Name:</strong>
            {{ $club->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Club Code:</strong>
            {{ $club->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Registration Date:</strong>
            {{ $club->regDate() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Teachers:</strong>
            <ol>
            @forelse($clubTeachers as $teacher)
            <a href="{{route('superadmin.teachers.show',$teacher->id)}}">
                <li>{{ $teacher->salutation }} {{ $teacher->full_name }} {{ $teacher->phone_no }}</li>
            </a>
            @empty
            <p>No teachers(s) assigned to {{ $club->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Substaffs:</strong>
            <ol>
            @forelse($clubStaffs as $staff)
            <a href="{{route('superadmin.staffs.show',$staff->id)}}">
                <li>{{ $staff->salutation }} {{ $staff->full_name }} - {{ $staff->phone_no }}</li>
            </a>
            @empty
            <p>No substaff(s) assigned to {{ $club->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Students:</strong>
            <ol>
            @forelse($clubStudents as $student)
            <a href="{{route('admin.students.show',$student->id)}}">
                <li>{{ $student->full_name }} {{ $student->stream->name }}</li>
            </a>
            @empty
            <p>No student(s) assigned to {{ $club->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Meetings:</strong>
            <ol>
            @forelse($clubMeetings as $meeting)
            <a href="{{route('admin.meetings.show',$meeting->id)}}">
                <li>
                    {{ $meeting->name }} will be held on {{ $meeting->getDate() }} at {{ $meeting->venue }}. Agenda will be {{ $meeting->agenda }}
                </li>
            </a>
            @empty
            <p>No meeting(s) assigned to {{ $club->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($club->created_at)) }}</span>
        </div>
    </div>
    @include('club.attachstudentform')
    @include('club.attachteacherform')
    @include('club.attachstaffform')
    @include('club.attachmeetingform')
</div>
</x-backend-main>
</x-admin>
