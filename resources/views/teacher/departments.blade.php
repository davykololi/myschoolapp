@extends('layouts.teacher')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="text-transform: uppercase;">{{$user->school->name}} DEPARMENTS</h3></div>
                    <div class="panel-body">
                        <ol>
                            @forelse($departments as $department)
                            <li>
                                <span style="text-transform: uppercase;">
                                    <a href="{{ route('teacher.dept.show', $department->id) }}">
                                        {{$department->name}}
                                    </a>       
                                </span>
                            </li>
                            @empty
                            <p style="color: red">{{$user->school->name}} has no department(s) yet.</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
