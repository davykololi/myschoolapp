@extends('layouts.superadmin')
@section('title', '| Stream Details')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            @include('partials.errors')
            <div class="col-md-12 margin-tb">
                <div class="pull-left">
                    <h2 style="text-transform: uppercase;">{{ $stream->name }} Details</h2>
                    <div>
                        <p>{{ $stream->name }} has {{ $streamStudentsNumber}} students. {{ $females }} female and {{ $males }} male</p>
                    </div>
                </div>
                <div class="pull-right">
                    <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stream Name:</strong>
                    {{ $stream->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Class:</strong>
                    {{ $stream->class->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stream Code:</strong>
                    {{ $stream->code }}
                </div>
            </div>
            <div class="flex flex-col md:flex-row lg:flex-row gap-4 my-4 p-4 border">
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="block bg-white p-4 h-full dark:bg-gray-800">
                    <strong class="uppercase underline">{{ $stream->name }} Students ({{ $streamStudents->count() }} Students)</strong>
                    <ol>
                    @forelse($streamStudents as $student)
                        <li>{{ $student->user->full_name }} {{ $student->phone_no }}</li>
                    @empty
                    <p style="color: red">No students(s) assigned to {{ $stream->name }} yet.</p>
                    @endforelse
                    </ol>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="block bg-white p-4 h-full dark:bg-gray-800">
                    <strong class="uppercase underline">{{ $stream->name }} Teachers:</strong>
                    <ol>
                    @forelse($streamTeachers as $teacher)
                        <li>{{ $teacher->user->salutation }} {{ $teacher->user->full_name }} {{ $teacher->phone_no }}</li>
                    @empty
                    <p style="color: red">No teacher(s) assigned to {{ $stream->name }} yet.</p>
                    @endforelse
                    </ol>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row lg:flex-row gap-4 my-4 p-4 border">
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="block bg-white p-4 h-full dark:bg-gray-800">
                    <strong>{{ $stream->name }} Assignments:</strong>
                    <ol>
                    @forelse($streamAssignments as $assignment)
                        <li>
                            {{ $assignment->name }} Given: {{ $assignment->date }} 
                            Deadline: {{ $assignment->deadline }} 
                            @foreach($assignment->teachers as $teacher)
                                <span style="color: blue">By:</span> {{$teacher->user->salutation}} {{$teacher->user->full_name}} {{$teacher->phone_no}}.
                            @endforeach
                        </li>
                    @empty
                        <p style="color: red">No assignment(s) to {{ $stream->name }} yet.</p>
                    @endforelse
                    </ol>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="block bg-white p-4 h-full dark:bg-gray-800">
                    <strong>{{ $stream->name }} Exams:</strong>
                    <ol>
                    @forelse($streamExams as $exam)
                        <li>
                            {{ $exam->name }} 
                            Start Date:{{ $exam->start_date }} End Date:{{ $exam->end_date }} 
                            {{ $exam->file }}
                        </li>
                    @empty
                    <p style="color: red">No exam(s) to {{ $stream->name }} yet.</p>
                    @endforelse
                    </ol>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row lg:flex-row gap-4 my-4 p-4 border">
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="block bg-white p-4 h-full dark:bg-gray-800">
                    <strong>{{ $stream->name }} Meetings:</strong>
                    <ol>
                    @forelse($streamMeetings as $meeting)
                        <li>{{ $meeting->name }} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }} at {{ $meeting->venue }}.     Agenda: {{ $meeting->agenda }}
                        </li>
                    @empty
                        <p style="color: red">No meeting(s) assigned to {{ $stream->name }} yet.</p>
                    @endforelse
                    </ol>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/2">
                    <div class="block bg-white p-4 h-full dark:bg-gray-800">
                    <strong>{{ $stream->name }} Awards:</strong>
                    <ol>
                    @forelse($streamRewards as $reward)
                        <li>{{ $reward->name }}. Purpose: {{ $reward->purpose }}.</li>
                    @empty
                    <p style="color: red">{{ $stream->name }} has notyet recieved any award.</p>
                    @endforelse
                    </ol>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ $stream->name }} Subjects:</strong>
                    <ol>
                    @if($streamSubjects->isNotEmpty())
                    @foreach($streamSubjects as $subject)
                        <li class="leading-tight">{{ $subject->name }}.</li>
                    @endforeach
                    @else
                    <p style="color: red">The subject(s) have notyet been assigned to {{ $stream->name }}.</p>
                    @endif
                    </ol>
                </div>
            </div>


            <hr style="border: 5px groove solid;" class="mt-4" />
            <h3 class="uppercase text-center font-bold mt-6 underline">{{ $stream->name }} {{__('Teachers')}}</h3>
            <div class="flex flex-col overflow-x-auto mt-2">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th class="py-2 px-4"><b>NO</b></th>
                                        <th class="py-2 px-4"><b>SUBJECT</b></th>
                                        <th class="py-2 px-4"><b>TECHER</b></th>
                                        <th class="py-2 px-4"><b>EMAIL</b></th>
                                        <th class="py-2 px-4"><b>ACTION</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($alocatedStreamSubjects->isNotEmpty())
                                    @foreach($alocatedStreamSubjects as $alocatedStreamSubject)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div><b>{{ $alocatedStreamSubject->subject->name }}</b></div>
                                        </td>
                                        <td class="p-2">
                                            <div>
                                                {{ $alocatedStreamSubject->teacher->user->salutation }} {{ $alocatedStreamSubject->teacher->user->full_name }}
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div><i>{{ $alocatedStreamSubject->teacher->user->email }}</i></div>
                                        </td>
                                        <td class="p-2">
                                            <div class="items-center justify-center">
                                                <form action="{{route('superadmin.streamsubject.remove',$alocatedStreamSubject->id)}}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="bg-red-800 text-white py-1 px-2 rounded" onclick="return confirm('Are you sure to delete {{ $alocatedStreamSubject->teacher->user->salutation}}  {{$alocatedStreamSubject->teacher->user->full_name}}?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($streamSubjects->isEmpty())
                                    <tr>
                                        <td style="color: red">
                                            The subjects facilitators have notyet been assigned to {{ $stream->name }}.
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-center font-hairline mt-4 mb-2">{{ __('ATTACH TEACHERS AND SUBJECTS TO CLASS')}}</h3>
            <div class="flex flex-col md:flex-row lg:flex-row gap-4 mb-4 border border-white p-4 rounded">
                <div  class="w-full md:w-1/2 lg:w-1/2">
                    <div class="flex flex-col">
                        <button class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" type="button" data-te-collapse-init
                        data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            {{ __('ATTACH TEACHERS') }}
                        </button>
                        <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                            <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                            @include('stream.superadmin_attachteacherform')
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="w-full md:w-1/2 lg:w-1/2">
                    <div class="flex flex-col">
                        <button class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" type="button" data-te-collapse-init
                        data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            {{ __('ATTACH SUBJECTS') }}
                        </button>
                        <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                            <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                @include('stream.superadmin_attachsubjectform')
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <h3 class="text-center font-hairline mt-8 mb-2">{{ __('ASSIGN SUBJECT TO TEACHER')}}</h3>
            <div class="max-w-full border border-white p-4 rounded">
                <form id="subject_teacher_form" action="{{ route('superadmin.streamsubject.store') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="hidden" name="stream_id" id="stream_id" class="form-control" value="{{ $stream->id }}">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:flex-row gap-4">
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <div class="flex flex-col">
                                <label>Select Subject : <span class="text-danger">*</span></label>
                                @include('ext._attach_stream_subjects')
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <div class="flex flex-col">
                                <label>Attach Teacher: <span class="text-danger">*</span></label>
                                <select id="teacher_id" type="teacher_id" value="{{old('teacher_id')}}" class="form-control" name="teacher_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Teacher">
                                @foreach ($streamTeachers as $streamTeacher)
                                    <option value="{{ $streamTeacher->id }}">
                                        {{ $streamTeacher->user->salutation }} {{ $streamTeacher->user->full_name }}
                                    </option>
                                @endforeach
                                </select>
                                @if($errors->has('teacher_id'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('teacher_id')}}</span>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row mt-4">
                        <div class="w-full md:w-[500px] rounded">
                            <div class="flex flex-col">
                                <input type="text" name="desc" id="desc" class="w-full" placeholder="Description">
                            </div>
                        </div>
                    </div>
                    @include('ext._submit_attach_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
