<form action="{{ route('detach.student.club',['id'=>$club->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Student</label>
        <div class="col-md-10">
            <select id="student" type="student" value="{{old('student')}}" class="form-control" name="student">
                <option value="">Select Student</option>
                @foreach ($clubStudents as $student)
                <option value="{{$student->id}}">{{$student->full_name}}</option>
                @endforeach
            </select>
            @include('ext._errors_student')
        </div>
    </div>
    @include('ext._submit_detach_button')
</form>