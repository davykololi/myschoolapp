<form action="{{ route('detach.meeting.student',['id'=>$student->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Meeting</label>
        <div class="col-md-10">
            <select id="meeting" type="meeting" value="{{old('meeting')}}" class="form-control" name="meeting">
                <option value="">Select Assignment</option>
                @foreach ($studentMeetings as $key => $studentMeeting)
                <option value="{{$studentMeeting->id}}">{{$studentMeeting->name}}</option>
                @endforeach
            </select>

            @if($errors->has('meeting'))
            <span class="help-block">
                <strong>{{$errors->first('meeting')}}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Detach</button>
        </div>
    </div>
</form>