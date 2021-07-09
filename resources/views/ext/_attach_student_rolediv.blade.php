    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Role</label>
        <div class="col-md-10">
            <select id="student_role" type="student_role" value="{{old('student_role')}}" class="form-control" name="student_role">
                <option value="">Select Role</option>
                @foreach ($studentRoles as $studentRole)
                <option value="{{$studentRole->id}}">{{$studentRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('student_role'))
            <span class="help-block">
                <strong>{{$errors->first('student_role')}}</strong>
            </span>
            @endif
        </div>
    </div>