<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ATTENDANCE DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.attendances.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Attendance Name:</strong>
            {{ $attendance->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Attendance Date</strong>
            {{ $attendance->date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Time</strong>
            {{ $attendance->time }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($attendance->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
