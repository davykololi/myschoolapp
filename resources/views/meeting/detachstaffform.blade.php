<form action="{{ route('detach.staff.meeting',['id'=>$meeting->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Substaff</label>
        <div class="col-md-10">
            <select id="staff" type="staff" value="{{old('staff')}}" class="form-control" name="staff">
                <option value="">Select Substaff</option>
                @foreach ($meetingStaffs as $staff)
                <option value="{{$staff->id}}">{{$staff->full_name}}</option>
                @endforeach
            </select>

            @if($errors->has('staff'))
            <span class="help-block">
                <strong>{{$errors->first('staff')}}</strong>
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