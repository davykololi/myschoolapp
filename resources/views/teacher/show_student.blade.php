<x-teacher>
@role('teacher')
    <!-- frontend-main view -->
    <x-frontend-main>
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">Student Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $student->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $student->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {{ $student->role }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Admission No.:</strong>
            {{ $student->admission_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ date("jS,F,Y",strtotime($student->dob)) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
            {{ $student->age }} years
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Class:</strong>
            {{ $student->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intake:</strong>
            {{ $student->getAdmissionMonth() }} Intake
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOA:</strong>
            {{ $student->getDoa() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory:</strong>
            {{ $student->dormitory->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $student->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Parent Info:</strong>
            <li><b>Father's Name:</b> {{ $student->fathers_name ? : __('TO BE UPDATED') }}</li>
            <li><b>Father's Occupation:</b> {{ $student->fathers_occupation ? : __('TO BE UPDATED') }}</li>
            <li><b>Mother's Name:</b> {{ $student->mothers_name ? : __('TO BE UPDATED') }}</li>
            <li><b>Mother's Occupation:</b> {{ $student->mothers_occupation ? : __('TO BE UPDATED') }}</li>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            {!! $student->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student Subjects:</strong>
            <ol>
            @forelse($student->stream->subjects as $subject)
                <li style="color: green;">{{ $subject->name }}</li>
            @empty
            <p>Subjects notyet assigned to this student's class.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student Awards:</strong>
            <ol>
            @forelse($student->rewards as $reward)
                <li>{{ $reward->name }} <span style="color: blue">Purpose:</span> {{ $reward->purpose }}.</li>
            @empty
            <p>This student has notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student Individual Assignments:</strong>
            <ol>
            @forelse($student->assignments as $assignment)
                <li>
                    {{ $assignment->name }} {{ $assignment->file}} <span style="color: blue">Given:</span> 
                    {{ \Carbon\Carbon::parse($assignment->date)->format('d-m-Y') }} <span style="color: red">Deadline:</span> 
                    {{ \Carbon\Carbon::parse($assignment->deadline)->format('d-m-Y') }} By: 
                    @foreach($assignment->teachers as $teacher)
                        {{$teacher->name}}.
                    @endforeach
                </li>
            @empty
            <p>This student has not been given any assignment(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student Clubs:</strong>
            <ol>
            @forelse($student->clubs as $club)
                <li>{{ $club->name }}</li>
            @empty
            <p>This student belongs to no club at the moment.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
</x-teacher>
