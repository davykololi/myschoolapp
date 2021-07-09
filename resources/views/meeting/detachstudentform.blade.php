<form action="{{ route('detach.student.meeting',['id'=>$meeting->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Student</label>
        <div class="col-md-10">
            <select id="student" type="student" value="{{old('student')}}" class="form-control" name="student">
                <option value="">Select Student</option>
                @foreach ($meetingStudents as $student)
                <option value="{{$student->id}}">{{$student->full_name}}</option>
                @endforeach
            </select>

            @if($errors->has('student'))
            <span class="help-block">
                <strong>{{$errors->first('student')}}</strong>
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