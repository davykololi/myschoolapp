    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Role</label>
        <div class="col-md-10">
            <select id="staff_role" type="staff_role" value="{{old('staff_role')}}" class="form-control" name="staff_role">
                <option value="">Select Role</option>
                @foreach ($staffRoles as $staffRole)
                <option value="{{$staffRole->id}}">{{$staffRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('staff_role'))
            <span class="help-block">
                <strong>{{$errors->first('staff_role')}}</strong>
            </span>
            @endif
        </div>
    </div>