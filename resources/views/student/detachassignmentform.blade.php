<form action="{{ route('detach.assign.student',['id'=>$student->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Assignment</label>
        <div class="col-md-10">
            <select id="assignment" type="assignment" value="{{old('assignment')}}" class="form-control" name="assignment">
                <option value="">Select Assignment</option>
                @foreach ($studentAssignments as $assignment)
                <option value="{{$assignment->id}}">{{$assignment->name}}</option>
                @endforeach
            </select>

            @if($errors->has('assignment'))
            <span class="help-block">
                <strong>{{$errors->first('assignment')}}</strong>
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