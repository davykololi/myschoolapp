<x-teacher>
@role('teacher')
    <!-- frontend-main view -->
    <x-frontend-main>
    <div class="row">
        @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">Teacher Details</h2>
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
            @if($teacher->gender === "Male")
            <img src="{{ $teacher->image_url }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ $teacher->user->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'">
            @elseif($teacher->gender === "Female")
            <img src="{{ $teacher->image_url }}" class="border-4 border-yellow-800 p-2 h-48 w-48" alt="{{ $teacher->user->full_name }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $teacher->user->salutation }} {{ $teacher->user->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $teacher->position->value }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $teacher->user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone:</strong>
            {{ $teacher->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assigned Subjects:</strong>
            @forelse($teacher->stream_subjects as $strmSubTeacher)
            <ul>
                <li><b>{{ $strmSubTeacher->subject->name }}</b> - <i>{{ $strmSubTeacher->stream->name }}</i>.</li>
            </ul>
            @empty
            <p style="color: red">The subject(s) have notyet been assigned to you.</p>
            @endforelse
            
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            {!! $teacher->history !!}
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
</x-teacher>
