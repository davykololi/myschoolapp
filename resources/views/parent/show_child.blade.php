@extends('layouts.parent')

@section('content')
@role('parent')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    @include('partials.messages')
    <div>
        <div>
            <h2 class="uppercase text-center">{{ $child->user->first_name }}'s DETAILS</h2>
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
            <img style="width:15%" src="{{ $child->image_url }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $child->user->salutation }} {{ $child->user->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $child->position->value }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Admission No.:</strong>
            {{ $child->admission_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $child->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $child->dob }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
            {{ $child->age }} years
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Class:</strong>
            {{ $child->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intake:</strong>
            {{ $child->intake->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory:</strong>
            {{ $child->dormitory->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $child->user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student Progress:</strong>
            @if(!empty($child->progress))
            @forelse($child->progress as $key => $p)
            {!! $p->content !!}
            @empty
            <p>No ducumentation about the student's progress done yet.</p>
            @endforelse
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Parent Info:</strong>
            <span style="color: green">Name:</span> {{ $child->parent->user->salutation }} {{ $child->parent->user->full_name }} 
            <span style="color: green">Phone:</span> {{ $child->parent->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $child->user->first_name }}'s Subjects:</strong>
            <ol>
                @if(!empty($streamSubjects))
                <li>
                    {!! \Arr::join($streamSubjects, ', ', ', and ') !!}.
                </li>
                @else
                    <span style="color: red">No subjects assigned to your class at the moment.</span>
                @endif
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fee Balance:</strong>
            Kshs: <span class="text-[red]">{{ number_format($child->fee_balance,2) }}</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $child->user->first_name }}'s Awards:</strong>
            <ol>
            @forelse($childAwards as $award)
                <li>{{ $award->name }} <span style="color: blue">Purpose:</span> {{ $award->purpose }}.</li>
            @empty
            <p>{{ $child->user->full_name }} has notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $child->user->first_name }}'s Assignments:</strong>
            <ol>
            @forelse($childAsignments as $assignment)
                <li>
                    {{ $assignment->name }} {{ $assignment->file}} <span style="color: blue">Given:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->date)) }} <span style="color: red">Deadline:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->deadline)) }}.
                </li>
            @empty
            <p>{{ $child->user->full_name }} has notyet been given any assignment(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $child->user->first_name }}'s Clubs:</strong>
            <ol>
            @forelse($childClubs as $club)
                <li>{{ $club->name }}</li>
            @empty
            <p>{{ $child->user->full_name }} has notyet been assigned to any club.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $child->user->first_name }}'s Meetings:</strong>
            <ol>
            @forelse($childMeetings as $key => $meeting)
                <li>
                    {{ $meeting->name }} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }}.
                    <span style="color: green"> Agenda:</span> {{ $meeting->agenda }}.
                </li>
            @empty
            <p>{{ $child->user->full_name }} has notyet been assigned to any meeting(s).</p>
            @endforelse
            </ol>
        </div>
    </div>

    <div class="my-4">
    @if(!is_null($currentExam))
    <form id="marksheets_form" action="{{ route('parent.download.examresults') }}" class="form-horizontal" method="get">
        {{ csrf_field() }}
        <div>
            <input type="hidden" name="stream_id" value="{{ $child->stream->id }}"/>
            <input type="hidden" name="child_name" value="{{ $child->user->full_name }}"/>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div><label>{{ $results }}</label></div>
                <button type="submit" class="bg-green-800 border-2 border-white text-white px-2 rounded-md">Download</button>
            </div>
        </div>
    </form>
    @else
    @endif
</div>
</div>
</main>
@endrole
@endsection
