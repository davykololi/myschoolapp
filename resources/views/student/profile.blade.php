@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <div class="row">
                    <div class="col-md-12 margin-tb">
                        <div class="pull-left">
                            <h2 style="text-transform: uppercase;">My Profile</h2>
                            <br/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <img style="width:25%" src="/storage/storage/{{ Auth::user()->image }}" onerror="this.src='{{asset('static/avatar.png')}}'" class="border-4 border-yellow-800 p-4" alt="{{ Auth::user()->full_name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->full_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Position:</strong>
                            {{ $user->student->position->value }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Adm. No:</strong>
                            {{ $user->student->admission_no }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOB:</strong>
                            {{ $user->student->getDob() }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Age:</strong>
                            {{ $user->student->age }} years.
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Active Parent:</strong>
                            {{ $user->student->parent->user->full_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Current Address:</strong>
                            {{ $user->student->parent->current_address }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permanent Address:</strong>
                            {{ $user->student->parent->permanent_address }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Stream:</strong>
                            {{ $user->student->stream->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Intake:</strong>
                            {{ $user->student->getAdmissionMonth() }} Intake
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOA:</strong>
                            {{ $user->student->getDoa() }} 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Dormitory:</strong>
                            {{ $user->student->dormitory->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Fee Balance:</strong>
                            Kshs: <span class="text-[red]">{{ number_format($user->student->fee_balance,2) }}</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Parents Info:</strong>
                            @if($user->student->student_info != null)
                            @if($user->student->student_info->fathers_name != null)
                            <li>
                                <span style="color: green">Father's Name:</span> {{ $user->student->student_info->fathers_name }}
                            </li>
                            @else
                            @endif

                            @if($user->student->student_info->fathers_occupation != null)
                            <li>
                                <span style="color: green">Father's Occupation:</span> {{ $user->student->student_info->fathers_occupation }} 
                            </li>
                            @else
                            @endif

                            @if($user->student->student_info->mothers_name != null)
                            <li>
                                <span style="color: green">Mothers's Name:</span> {{$user->student->student_info->mothers_name }}
                            </li>
                            @else
                            @endif

                            @if($user->student->student_info->mothers_occupation != null)
                            <li>
                                <span style="color: green">Mothers's Occupation:</span> {{ $user->student->student_info->mothers_occupation }}
                            </li>
                            @else
                            @endif

                            @if($user->student->student_info->mothers_annual_income != null)
                            <li>
                                <span style="color: green">Mothers's Annual Income:</span> {{ $user->student->student_info->mothers_annual_income }}
                            </li>
                            @else
                            @endif

                            @if($user->student->student_info->guardian_name != null)
                            <li>
                                <span style="color: green">Guardian Name:</span> {{ $user->student->guardian_name }}
                            </li>
                            @else
                            @endif

                            @if($user->student->student_info->guardian_occupation != null)
                            <li>
                                <span style="color: green">Guardian Occupation:</span> {{ $user->student->guardian_occupation }}
                            </li>
                            @else
                            @endif
            
                            @else
                            <li>
                                <span> {{ __('No Information') }} </span>
                            </li>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Stream Subjects:</strong>
                            @if(!empty($streamSubjects))
                                {!! \Arr::join($streamSubjects, ', ', ', and ') !!}.
                            @else
                                <span style="color: red">No subjects assigned to your class at the moment.</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Subjects Facilitators:</strong>
                            <ol>
                                @forelse($streamSubjectFacilitators as $streamSubjectFacilitator)
                                <li>
                                    {{ $streamSubjectFacilitator->teacher->user->full_name }}: {{ $streamSubjectFacilitator->subject->name }}
                                </li>
                                @empty
                                    <span style="color: red">No teacher(s) assigned to your class at the moment.</span>
                                @endforelse
                            </ol>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong> Individual Assignments:</strong>
                            <ol>
                                @forelse(Auth::user()->student->assignments as $assignment)
                                <li>
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
                                </li>
                                @empty
                                    <span style="color: red">You don't have any assignment yet.</span>
                                @endforelse
                            </ol>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Awards:</strong>
                            <ol>
                            @forelse($user->student->rewards as $reward)
                                <li>
                                    {{$reward->name}}. Purpose: {{$reward->purpose}}.
                                </li>
                            @empty
                                <span style="color: red">You have notyet recieved any award. Work hard for one!!</span>
                            @endforelse
                            </ol>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Meetings:</strong>
                            <ol>
                            @forelse($user->student->meetings as $meeting)
                                <li>
                                    {{$meeting->name}} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }}. 
                                    <span style="color: green">Agenda:</span> {{$meeting->agenda}}.
                                </li>
                            @empty
                                <span style="color: red">You have  not been assigned to any meeting(s).</span>
                            @endforelse
                            </ol>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Clubs:</strong>
                            <ol>
                            @forelse($user->student->clubs as $club)
                                <li>
                                    <a href="{{ route('student.club', $club->id) }}">{{$club->name}}</a>
                                </li>
                            @empty
                                <span style="color: red">You have  not been assigned to any club(s).</span>
                            @endforelse
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    @if(!is_null($currentExam))
                    <form id="marksheets_form" action="{{ route('student.download.results') }}" class="form-horizontal" method="get">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div><label>{{ $results }}</label></div>
                                <button type="submit">
                                    <x-pdf-svg/>
                                </button>
                            </div>
                        </div>
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
