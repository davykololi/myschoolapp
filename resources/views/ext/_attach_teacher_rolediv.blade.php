            <select id="teacher_role" type="teacher_role" value="{{old('teacher_role')}}" class="form-control" name="teacher_role">
                <option value="">Select Role</option>
                @foreach ($teacherRoles as $teacherRole)
                <option value="{{$teacherRole->id}}">{{$teacherRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('teacher_role'))
            <span class="help-block">
                <span class="text-danger">{{$errors->first('teacher_role')}}</span>
            </span>
            @endif