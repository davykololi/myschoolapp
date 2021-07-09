    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Assignment</label>
        <div class="col-md-10">
            <select id="assignment" type="assignment" value="{{old('assignment')}}" class="form-control" name="assignment">
                <option value="">Select Assignment</option>
                @foreach ($assignments as $assignment)
                <option value="{{$assignment->id}}">{{$assignment->name}}</option>
                @endforeach
            </select>
            @include('ext._errors_assignment')
        </div>
    </div>