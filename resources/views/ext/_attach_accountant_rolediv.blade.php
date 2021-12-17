            <select id="accountant_role" type="accountant_role" value="{{old('accountant_role')}}" class="form-control" name="accountant_role">
                <option value="">Select Role</option>
                @foreach ($accountantRoles as $key => $accountantRole)
                    <option value="{{$accountantRole->id}}">{{$accountantRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('accountant_role'))
            <span class="help-block">
                <span class="text-danger">{{$errors->first('accountant_role')}}</span>
            </span>
            @endif