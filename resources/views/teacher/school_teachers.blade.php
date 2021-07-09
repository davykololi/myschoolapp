@extends('layouts.teacher')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="text-transform: uppercase;">{{$user->school->name}} Teachers</h3></div>
                    <div class="panel-body">
                        <div>
                            @if(!empty($headTeachers))
                            @forelse($headTeachers as $key => $head)
                            <div>
                                <a href="{{route('teacher.show',$head->id)}}">
                                    <h1 style="text-transform: uppercase;"><b>{!! $head->position_teacher->name !!}</b></h1>
                                </a>
                                <a href="{{route('teacher.show',$head->id)}}">
                                    <img style="width:15%" src="/storage/storage/{{ $head->image }}">
                                </a>
                                <p><b>{!! $head->title !!} {!! $head->full_name !!}</b></p>
                                <p>Phone: <span style="color: green"> {{ $head->phone_no}} </span></p>
                                <p>Email: <span style="color: blue">{{ $head->email}}</span></p>
                            </div>
                            @empty
                                <img style="width:15%" src="{{asset('static/avatar.png')}}" alt="No Principal">
                                <p>Currently {{$user->school->name}} has no Principal.</p>
                            @endforelse
                            @endif
                        </div>
                        <br/><hr/>
                        <div>
                            @if(!empty($deputyHeadTeachers))
                            @forelse($deputyHeadTeachers as $key => $deputyHead)
                            <div>
                                <a href="{{route('teacher.show',$deputyHead->id)}}">
                                    <h2 style="text-transform: uppercase;"><b>{{$deputyHead->position_teacher->name}}</b></h2>
                                </a>
                                <a href="{{route('teacher.show',$deputyHead->id)}}">
                                    <img style="width:15%" src="/storage/storage/{{ $deputyHead->image }}" alt="$deputyHead->full_name">
                                </a>
                                <p><b>{{ $deputyHead->title}} {{ $deputyHead->full_name}}</b></p>
                                <p>Phone: <span style="color: green"> {{ $deputyHead->phone_no}} </span></p>
                                <p>Email: <span style="color: blue">{{ $deputyHead->email}}</span></p>
                            </div>
                            @empty
                                <img style="width:15%" src="{{asset('static/avatar.png')}}" alt="No Deputy Principal">
                                <p>Currently {{$user->school->name}} has no Deputy Principal.</p>
                            @endforelse
                            @endif
                        </div>
                        <br/><hr/>
                        <div>
                            <h2 style="text-transform: uppercase;color: green;"><b>{{$scienceDept->name}}</b></h2>
                            @if(!empty($scienceDeptHeadTeachers))
                            @forelse($scienceDeptHeadTeachers as $key => $scienceDeptHeadTeacher)
                            <div>
                                <a href="{{route('teacher.show',$scienceDeptHeadTeacher->id)}}">
                                    <h2 style="text-transform: uppercase;"><b>{{$scienceDeptHeadTeacher->position_teacher->name}}</b></h2>
                                </a>
                                <a href="{{route('teacher.show',$scienceDeptHeadTeacher->id)}}">
                                    <img style="width:15%" src="/storage/storage/{{ $scienceDeptHeadTeacher->image }}">
                                </a>
                                <p><b>{{ $scienceDeptHeadTeacher->title}} {{ $scienceDeptHeadTeacher->full_name}}</b></p>
                                Phone: <span style="color: green"> {{ $scienceDeptHeadTeacher->phone_no}} </span>
                                Email: <span style="color: blue">{{ $scienceDeptHeadTeacher->email}}</span>.
                            </div>
                            @empty
                                <img style="width:15%" src="{{asset('static/avatar.png')}}" alt="No Science Department Head">
                                <p>Currently {{$user->school->name}} has no {{$scienceDept->name}} Head.</p>
                            @endforelse
                            @endif
                        </div>
                        <br/>
                        <div>
                            @if(!empty($scienceDeptAssHeadTeachers))
                            @forelse($scienceDeptAssHeadTeachers as $key => $scienceDeptAssHeadTeacher)
                            <div>
                                <a href="{{route('teacher.show',$scienceDeptAssHeadTeacher->id)}}">
                                    <h2 style="text-transform: uppercase;"><b>{{$scienceDeptAssHeadTeacher->position_teacher->name}}</b></h2>
                                </a>
                                <a href="{{route('teacher.show',$scienceDeptAssHeadTeacher->id)}}">
                                    <img style="width:15%" src="/storage/storage/{{ $scienceDeptAssHeadTeacher->image }}">
                                </a>
                                <p><b>{{ $scienceDeptAssHeadTeacher->title}} {{ $scienceDeptAssHeadTeacher->full_name}}</b></p>
                                Phone: <span style="color: green"> {{ $scienceDeptAssHeadTeacher->phone_no}} </span>
                                Email: <span style="color: blue">{{ $scienceDeptAssHeadTeacher->email}}</span>.
                            </div>
                            @empty
                                <img style="width:15%" src="{{asset('static/avatar.png')}}" alt="No Science Department Assistant Head">
                                <p>Currently {{$user->school->name}} has no {{$scienceDept->name}} Assistant Head.</p>
                            @endforelse
                            @endif
                        </div>
                        <br/><br/>
                        <div>
                            <h5 style="text-transform: uppercase;"><b>{{$scienceDept->name}} Staff</b></h5>
                            @if(!empty($scienceDeptTeachers))
                            @forelse($scienceDeptTeachers as $key => $scienceDeptTeacher)
                            <div>
                                <a href="{{route('teacher.show',$scienceDeptTeacher->id)}}">
                                    <img style="width:15%" src="/storage/storage/{{ $scienceDeptTeacher->image }}">
                                </a>
                                <p><b>{{ $scienceDeptTeacher->title}} {{ $scienceDeptTeacher->full_name}}</b></p>
                                Phone: <span style="color: green"> {{ $scienceDeptTeacher->phone_no}} </span>
                                Email: <span style="color: blue">{{ $scienceDeptTeacher->email}}</span>.
                            </div>
                            @empty
                                <img style="width:15%" src="{{asset('static/avatar.png')}}" alt="No Science Department Teachers">
                                <p>Currently no staff teachers assigned to {{$user->school->name}} {{$scienceDept->name}}.</p>
                            @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
