            <select id="student_role" type="student_role" value="{{old('student_role')}}" class="form-control" name="student_role">
                <option value="">Select Role</option>
                @foreach ($studentRoles as $studentRole)
                <option value="{{$studentRole->id}}">{{$studentRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('student_role'))
            <span class="help-block">
                <span class="text-danger">{{$errors->first('student_role')}}</span>
            </span>
            @endif