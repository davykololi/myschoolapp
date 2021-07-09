    <div class="form-group">
        <label class="control-label col-sm-2" >Role</label>
        <div class="col-md-10">
            <select id="accountant_role" type="accountant_role" value="{{old('accountant_role')}}" class="form-control" name="accountant_role">
                <option value="">Select Role</option>
                @foreach ($accountantRoles as $key => $accountantRole)
                <option value="{{$accountantRole->id}}">{{$accountantRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('accountant_role'))
            <span class="help-block">
                <strong>{{$errors->first('accountant_role')}}</strong>
            </span>
            @endif
        </div>
    </div>