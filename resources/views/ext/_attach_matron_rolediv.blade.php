    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Role</label>
        <div class="col-md-10">
            <select id="matron_role" type="matron_role" value="{{old('matron_role')}}" class="form-control" name="matron_role">
                <option value="">Select Role</option>
                @foreach ($matronRoles as $key => $matronRole)
                <option value="{{$matronRole->id}}">{{$matronRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('matron_role'))
            <span class="help-block">
                <strong>{{$errors->first('matron_role')}}</strong>
            </span>
            @endif
        </div>
    </div>