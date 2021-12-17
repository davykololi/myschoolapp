            <select id="staff_role" type="staff_role" value="{{old('staff_role')}}" class="form-control" name="staff_role">
                <option value="">Select Role</option>
                @foreach ($staffRoles as $staffRole)
                    <option value="{{$staffRole->id}}">{{$staffRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('staff_role'))
            <span class="help-block">
                <span class="text-danger">{{$errors->first('staff_role')}}</span>
            </span>
            @endif