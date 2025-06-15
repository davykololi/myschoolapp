@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-16 lg:px-6">
    <div class="text-center mb-10">
        <h1 class="text-4xl tracking-tight font-bold text-primary-800">My Profile</h1>
    </div>

    <div class="flex flex-col md:flex-row">
        <!-- can help image -->
        <div class="mr-0 md:mr-8 mb-6 md:mb-0 w-full md:1/3 lg:w-1/3 mt-4 md:mt-12 lg:mt-12">
            <div class="border-4 border-yellow-600">
                <x-user-profile-picture/>
            </div>
        </div>
        <!-- end can help image -->

        <div class="flex-1 flex flex-col sm:flex-row flex-wrap -mb-4 -mx-2">
            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">Personal Details</h3>
                    <p class="text-sm">Name: {{ $user->full_name }}</p>
                    <p class="text-sm">Email: {{ $user->email }}</p>
                    <p class="text-sm">DOB: {{ $user->student->getDob() }}</p>
                    <p class="text-sm">Age: {{ $user->student->age }} Years</p>
                    <p class="text-sm">Guardian: {{ $user->student->parent->user->full_name }}</p>
                    <p class="text-sm">Current Address: {{ $user->student->parent->current_address }}</p>
                    <p class="text-sm">Permanent Address: {{ $user->student->parent->permanent_address }}</p>
                </div>
            </div>
            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">School Details</h3>
                    <p class="text-sm">DOA: {{ $user->student->getDoa() }}</p>
                    <p class="text-sm">Intake: {{ $user->student->getAdmissionMonth() }} Intake</p>
                    <p class="text-sm">Admission No: {{ $user->student->admission_no }}</p>
                    <p class="text-sm">Class: {{ $user->student->stream->name }}</p>
                    <p class="text-sm">Dormitory: {{ $user->student->dormitory->name }}</p>
                    <p class="text-sm">Role: {{ $user->student->position->value }}</p>
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">More Guardian Information</h3>
                    @if($user->student->student_info != null)
                    @if($user->student->student_info->fathers_name != null)
                    <p><span style="color: green">Father's Name:</span> {{ $user->student->student_info->fathers_name }}</p>
                    @else
                    @endif

                    @if($user->student->student_info->fathers_occupation != null)
                    <p><span style="color: green">Father's Occupation:</span> 
                        {{ $user->student->student_info->fathers_occupation }} 
                    </p>
                    @else
                    @endif

                    @if($user->student->student_info->mothers_name != null)
                    <p><span style="color: green">Mothers's Name:</span> {{$user->student->student_info->mothers_name }}</p>
                    @else
                    @endif

                    @if($user->student->student_info->mothers_occupation != null)
                    <p>
                        <span style="color: green">Mothers's Occupation:</span> {{ $user->student->student_info->mothers_occupation }}
                    </p>
                    @else
                    @endif

                    @if($user->student->student_info->mothers_annual_income != null)
                    <p>
                        <span style="color: green">Mothers's Annual Income:</span> {{ $user->student->student_info->mothers_annual_income }}
                    </p>
                    @else
                    @endif

                    @if($user->student->student_info->guardian_name != null)
                    <p>
                        <span style="color: green">Guardian Name:</span> {{ $user->student->guardian_name }}
                    </p>
                    @else
                    @endif

                    @if($user->student->student_info->guardian_occupation != null)
                    <p>
                        <span style="color: green">Guardian Occupation:</span> {{ $user->student->guardian_occupation }}
                    </p>
                    @else
                    @endif

                    @else
                    <p><span> {{ __('No Information Provided') }} </span></p>
                    @endif
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">{{ $user->student->stream->name }} Subjects</h3>
                    <h5>The following are subjects taken by students in {{ $user->student->stream->name }}:</h5>
                    <p class="text-sm">
                    @if(!empty($streamSubjects))
                        {!! \Arr::join($streamSubjects, ', ', ', and ') !!}.
                    @else
                        <span style="color: red">No subjects assigned to your class at the moment.</span>
                    @endif
                    </p>
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">{{ $user->student->stream->name }} Teachers</h3>
                    @forelse($streamSubjectFacilitators as $streamSubjectFacilitator)
                    <ol>
                        <li class="text-sm">
                            {{ $streamSubjectFacilitator->teacher->user->full_name }} - {{ $streamSubjectFacilitator->teacher->phone_no }}: {{ $streamSubjectFacilitator->subject->name }}
                        </li>
                    </ol>
                    @empty
                        <p><span style="color: red">No teacher(s) assigned to your class at the moment.</span></p>
                    @endforelse
                    
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">Individual Assignments</h3>
                    @forelse(Auth::user()->student->assignments as $assignment)
                    <p class="text-sm">
                    {{$assignment->name}}  
                        <i style="color: blue">Published:</i> 
                        {{ \Carbon\Carbon::parse($assignment->date)->format('d-m-Y') }} 
                        <i style="color: red">Deadline</i> {{ \Carbon\Carbon::parse($assignment->deadline)->format('d-m-Y') }} 
                        @foreach($assignment->teachers as $teacher)
                        By: {{$teacher->salutation}} {{$teacher->user->full_name}} {{$teacher->phone_no}}
                        @endforeach
                        <a href="{{route('student.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                            Download
                        </a>
                    </p>
                    @empty
                    <p><span style="color: red">You don't have any individual assignment yet.</span></p>
                    @endforelse
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">Awards</h3>
                    @forelse($user->student->awards as $award)
                    <p>
                        {{$award->name}}.
                    </p>
                    <p>
                        Purpose: {{$award->purpose}}.
                    </p>
                    @empty
                    <p>
                        <span style="color: red">You have notyet recieved any award. Work hard for one!!</span>
                    </p>
                    @endforelse
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">Meetings</h3>
                    @forelse($user->student->meetings as $meeting)
                    <p>
                        {{$meeting->name}} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }}. 
                        <span style="color: green">Agenda:</span> {{$meeting->agenda}}.
                    </p>
                    @empty
                    <p><span style="color: red">You have  not been assigned to any meeting(s).</span></p>
                    @endforelse
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">Clubs</h3>
                    @forelse($user->student->clubs as $club)
                    <p>
                        <a href="{{ route('student.club', $club->id) }}">{{$club->name}}</a>
                    </p>
                    @empty
                    <p><span style="color: red">You have  not been assigned to any club(s).</span></p>
                    @endforelse
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">Fee Balance</h3>
                    @if(Auth::user()->student->fee_balance > 0)
                    <p class="text-[red]">
                        Kshs: {{ number_format(Auth::user()->student->fee_balance,2) }}
                    </p>
                    @elseif(Auth::user()->student->total_payment_amount === null)
                    <p class="bg-white text-green-800 py-1 px-2 rounded-md">{{ __('Payments Notyet Commensed') }}</p>
                    @elseif(Auth::user()->student->fee_balance === 0)
                    <p class="bg-white text-green-800 py-1 px-2 rounded-md">{{ __('Fee Cleared') }}</p>
                    @endforelse
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    @if(!is_null($currentExam))
                    <form id="marksheets_form" action="{{ route('student.download.results') }}" class="form-horizontal" method="get">
                        {{ csrf_field() }}
                        <h3 class="text-2xl font-bold text-md mb-6">{{ $results }}</h3>
                        <button type="submit">
                            <x-pdf-svg/>
                        </button>
                    </form>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
