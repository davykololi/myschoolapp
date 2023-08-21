<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>TIMETABLE DETAILS</h2>
            <br/>
        </div>
        <div class="text-center uppercase text-2xl">
            @include('partials.messages')
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.timetables.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>File:</strong>
            <a href="{{route('admin.timetable.download',$timetable->id)}}" class="btn btn-outline-warning">Download</a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $timetable->desc }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School:</strong>
            {{ $timetable->school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stream:</strong>
            @foreach($timetable->streams as $stream)
                {{ $stream->name }}
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($timetable->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
