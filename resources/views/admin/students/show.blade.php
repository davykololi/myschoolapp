<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 class="uppercase">{{ $student->full_name }} Profile</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="btn btn-primary pull-right"> Back</a>
        </div>
    </div>
</div>


<div class="block md:w-1/3 mx-auto rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
  <div
    class="relative overflow-hidden bg-cover bg-no-repeat"
    data-te-ripple-init
    data-te-ripple-color="light">
    <img class="rounded-t-lg h-64 w-64 mx-auto pt-8" src="{{ $student->image_url }}" alt="" onerror="this.src='{{asset('static/avatar.png')}}'"/>
    <a href="#!">
      <div
        class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
    </a>
  </div>
  <div class="p-6">
    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
      {{ $student->full_name }}
    </h5>
  </div>
</div>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {{ $student->role->name }}
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
            <strong>Phone No.:</strong>
            {{ $student->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $student->getDob() }}
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
            <strong>DOA:</strong>
            {{ $student->getDoa() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intake:</strong>
            {{ $student->getAdmissionMonth() }}
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
            <strong>Admission Marks:</strong>
            {{ $student->adm_mark }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Parents Info:</strong>
            @if($student->student_info != null)
            @if($student->student_info->fathers_name != null)
            <li>
                <span style="color: green">Father's Name:</span> {{ $student->student_info->fathers_name }}
            </li>
            @else
            @endif

            @if($student->student_info->fathers_occupation != null)
            <li>
                <span style="color: green">Father's Occupation:</span> {{ $student->student_info->fathers_occupation }} 
            </li>
            @else
            @endif

            @if($student->student_info->mothers_name != null)
            <li>
                <span style="color: green">Mothers's Name:</span> {{$student->student_info->mothers_name }}
            </li>
            @else
            @endif

            @if($student->student_info->mothers_occupation != null)
            <li>
                <span style="color: green">Mothers's Occupation:</span> {{ $student->student_info->mothers_occupation }}
            </li>
            @else
            @endif

            @if($student->student_info->mothers_annual_income != null)
            <li>
                <span style="color: green">Mothers's Annual Income:</span> {{ $student->student_info->mothers_annual_income }}
            </li>
            @else
            @endif

            @if($student->student_info->guardian_name != null)
            <li>
                <span style="color: green">Guardian Name:</span> {{ $student->guardian_name }}
            </li>
            @else
            @endif

            @if($student->student_info->guardian_occupation != null)
            <li>
                <span style="color: green">Guardian Occupation:</span> {{ $student->guardian_occupation }}
            </li>
            @else
            @endif
            
            @else
            <li>
                <span class="text-[red]" > {{ __('No Information') }} </span>
            </li>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->stream->name }}'s Subjects:</strong>
            <p>
            @if(!empty($streamSubjects))
                {!! \Arr::join($streamSubjects, ', ', ', and ') !!}.
            @else
                <span style="color: red">No subjects assigned to your class at the moment.</span>
            @endif
            </p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->first_name }}'s Awards:</strong>
            <ol>
            @forelse($student->rewards as $reward)
            <a href="{{route('admin.rewards.show',$reward->id)}}">
                <li>{{ $reward->name }} <span style="color: blue">Purpose:</span> {{ $reward->purpose }}.</li>
            </a>
            @empty
                <p class="text-[red]">{{ $student->first_name }} notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->first_name }}'s Assignments:</strong>
            <ol>
            @forelse($student->assignments as $assignment)
                <li>
                    {{ $assignment->name }}  <span style="color: blue">Given:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->date_given)) }} <span style="color: red">Deadline:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->deadline)) }}
                    @foreach($assignment->teachers as $teacher)
                    By: {{$teacher->title}} {{$teacher->name}} {{$teacher->phone_no}} - 
                    @endforeach
                    {{ $assignment->file}}
                </li>
            @empty
                <p class="text-[red]">{{ $student->first_name }} notyet been given any assignment(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->first_name }}'s Clubs:</strong>
            <ol>
            @forelse($student->clubs as $club)
            <a href="{{route('admin.clubs.show',$club->id)}}">
                <li>{{ $club->name }}</li>
            </a>
            @empty
                <p class="text-[red]">{{ $student->first_name }} notyet been assigned to any club.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->first_name }}'s Meetings:</strong>
            <ol>
            @forelse($student->meetings as $key => $meeting)
            <a href="{{route('admin.meetings.show',$meeting->id)}}">
                <li>
                    {{$meeting->name}} to be held on {{ $meeting->getDate() }} at {{ $meeting->venue }}. Agenda will be 
                     {{ $meeting->agenda }}.
                </li>
            </a>
            @empty
                <p class="text-[red]">{{ $student->first_name }} notyet been assigned to any meeting(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>More About {{ $student->first_name }}:</strong>
            {!! $student->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($student->created_at)) }}</span>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('student.attachsubjectform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('student.attachrewardform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('student.attachassignmentform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('student.attachmeetingform')
    </div>
</div>
</x-backend-main>
</x-admin>