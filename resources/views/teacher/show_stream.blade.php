@extends('layouts.teacher')
@section('title')
{{ Auth::user()->school->name}} {{ $stream->name }} {{ __('Details') }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
 @include('partials.messages')
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8 bg-gray-400 p-4">
            <div class="pull-left">
                <h2 class="uppercase text-center text-2xl font-hairline">{{$stream->name}} Details</h2>
            </div>
            <div class="mt-2">
                <h3 class="text-center font-hairline">
                    {{ __('Welcome') }} {{ Auth::user()->salutation }} {{ Auth::user()->first_name}}. 

                    @if($streamSubject->stream->name === $stream->name)
                    <span>You are our {{ $streamSubject->subject->name }} Teacher.</span>
                    @endif
                </h3>
            </div>
            <div class="text-right">
                <x-back-button/>
            </div>
            <div class="rounded text-dark mt-16 mb-8 p-4 w-full md:w-1/2 dark:text-slate-400 border-2 glass prose-xs mx-auto">
                <h3 style="text-transform: uppercase;" class="mb-2 font-bold underline">
                    {{$stream->name}} Timetables
                </h3>
                @if(!empty($streamTimetables))
                @forelse($streamTimetables as $timetable)
                <div class="justify-center items-center">
                    <ol>
                        <li class="text-body-color mb-4 flex text-base">
                            <span class="relative z-10 mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded text-base text-white">
                            <span class="bg-primary absolute top-0 left-0 z-[-1] h-full w-full -rotate-45 rounded"></span>
                                {{ $loop->iteration }}
                            </span>
                            <span>{{ $timetable->desc }}</span>
                            <span>
                                <a type="button" href="{{route('teacher.timetable.download',$timetable->id)}}" class="bg-yellow-700 px-2 py-1 text-white rounded ml-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-flex pb-0.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </a>
                            </span>
                        </li>
                    </ol>
                </div>
                @empty
                <p style="color: red">{{$stream->name}} Timetable Notyet Uploaded.</p>
                @endforelse
                @endif
            </div>


            <!-- Attendance form -->
            <form action="#" method="POST" class="py-8 px-4 border rounded mt-4 dark:border-slate-400 dark:text-slate-400" enctype="multipart/form-data">
                        @include('ext._csrfdiv')

            <div class="mb-4">
                <select id="class_attendance" type="class_attendance" value="{{old('class_attendance')}}" class="form-control" name="class_attendance">
                    <option value="">Select Attendance</option>
                    <option value="{{ $stream->name }}">Class Register</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                @if($streamStudents->isNotEmpty())
                @forelse($streamStudents as $student)
                <div class="w-full rounded bg-white pt-4 md:px-0 shadow-lg dark:bg-stone-600 dark:text-slate-400">
                    <div>
                        <img class="w-full md:w-48 h-auto md:h-48 p-2 mx-auto rounded border-double border-8 border-yellow-800 bg-gray-800" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'">
                        <div class="bg-blue-900 text-sm w-full h-20 rounded-b text-white mt-2 px-2 md:mb-0 dark:bg-black dark:text-slate-400">
                            <div class="pt-2">{{ $student->user->full_name }}</div>
                            <input type="hidden" name="student_id" value="{{ $student->id}}">
                            <input type="hidden" name="date" value="{{ \Carbon\Carbon::now() }}">
                            <div>Present
                                <input type="checkbox" class="accent-pink-500 ml-[15px] dark:bg-gray-900 dark:text-slate-400" checked>
                            </div>
                            <div>Absent
                                <input type="checkbox" class="accent-pink-500 ml-[20px] dark:bg-gray-900 dark:text-slate-400" checked>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="px-8 text-center py-2">
                    Students Notyet Assigned To This Stream.
                </div>
                @endforelse
                @endif
            </div>
            </form> <!-- End Attendance Form -->
            
            <hr class="border-2 border-double w-full mt-8"/>
            <div class="mt-8">
                <h2 class="uppercase font-hairline text-center text-2xl mb-4">{{$stream->name}} Teachers</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @forelse($teacherStreamSubjects as $teacherStreamSubject)
                @if(($teacherStreamSubject->stream_id === $stream->id) && ($teacherStreamSubject->teacher_id === $user->teacher->id))
                <div class="card w-full md:w-[350px] glass">
                    <div class="card-header">
                        <figure>
                            <a href="{{ route('teacher.show',$teacherStreamSubject->teacher->id) }}"> 
                                <div class="avatar my-4">
                                    <div class="w-48 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                        <img src="{{ $teacherStreamSubject->teacher->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'" />
                                    </div>
                                </div>
                            </a>
                        </figure>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('teacher.show', $teacherStreamSubject->teacher->id) }}">
                            <h2 class="card-title">
                                {{ $teacherStreamSubject->teacher->user->salutation }} {{ $teacherStreamSubject->teacher->user->full_name }}
                            </h2>
                            <p>{{ $teacherStreamSubject->teacher->phone_no }}</p>
                            <p>{{ $teacherStreamSubject->subject->name }}</p>
                        </a>
                    </div>
                </div>
                @endif
                @empty
                <p style="color: red">The subject(s) have notyet been assigned to you.</p>
                @endforelse
            </div>

            <hr class="border-2 border-double w-full mt-8"/>
            <h3 class="uppercase text-center text-xl font-hairline mt-8">My Notes To {{ $stream->name }}</h3>
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="p-4" width="10%">NO</th>
                                        <th scope="col" class="p-4" width="50%">NOTES</th>
                                        <th scope="col" class="p-4" width="20%">STREAM</th>
                                        <th scope="col" class="p-4" width="10%">DOWNLOAD</th>
                                        <th scope="col" class="p-4" width="10%">DELETE</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($teacherNotes->isNotEmpty())
                                    @foreach($teacherNotes as $note)
                                    @if(($note->stream_id === $stream->id) && ($note->teacher_id === Auth::user()->teacher->id))
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration  }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $note->desc  }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $note->stream->name  }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div></div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('teacher.delete.notes',$note->id)}}" method="GET" class="inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                                <x-delete-svg/>
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                    @elseif($note->stream_id != $stream->id)
                                    <tr>
                                        <td colspan="16" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400">
                                            I have not given notes to this stream at the moment
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($teacherNotes->isEmpty())
                                    <tr>
                                        <td colspan="16" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400">
                                            I have not given notes to this stream at the moment
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="w-full mt-8"/>
            <div class="mt-8">
                <h3 class="text-center font-bold underline text-2xl">ASSIGN NOTES TO THIS CLASS</h3>
                    <form action="{{ route('teacher.store.notes') }}" method="POST" class="py-8 px-4 border rounded mt-4 dark:border-slate-400 dark:text-slate-400" enctype="multipart/form-data">
                        @include('ext._csrfdiv')
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="hidden" name="stream_id" id="stream_id" class="form-control" value="{{ $stream->id}}">
                            </div>
                        </div>
                        <div class="w-full flex flex-col md:flex-row gap-16">
                            <div class="w-full md:w-1/2 lg:w-1/2">
                                <label class="flex flex-col">Notes Topic:</label>
                                <div class="flex-1">
                                    <input type="text" name="desc" id="desc" class="w-full dark:bg-gray-600 dark:placeholder-slate-200" placeholder="Topic">
                                    @error('desc')
                                    <strong class="text-red-700">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/2">
                                <label class="flex flex-col">Upload File:</label>
                                <div>
                                    <input type="file" name="file" id="file" class="file" placeholder="File For Upload">
                                    @error('file')
                                    <strong class="text-red-700">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="hidden" name="subject_id" id="subject_id" class="form-control" value="{{ $streamSubject->subject->id}}">
                            </div>
                        </div>
                        <div class="mt-4">
                            @include('ext._submit_button')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection