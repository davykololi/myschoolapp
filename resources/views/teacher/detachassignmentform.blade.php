<form action="{{ route('detach.assign.teacher',['id'=>$teacher->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Assignment</label>
        <div class="col-md-10">
            <select id="assignment" type="assignment" value="{{old('assignment')}}" class="form-control" name="assignment">
                <option value="">Select Assignment</option>
                @foreach ($teacherAssignments as $assignment)
                <option value="{{$assignment->id}}">{{$assignment->name}}</option>
                @endforeach
            </select>
            @include('ext._errors_assignment')
        </div>
    </div>
    @include('ext._submit_detach_button')
</form>