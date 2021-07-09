    <div class="form-group">
        <label class="control-label col-sm-2" >Attach SubStaff</label>
        <div class="col-md-10">
            <select id="staff" type="staff" value="{{old('staff')}}" class="form-control" name="staff">
                <option value="">Select Subordinate Staff</option>
                @foreach ($staffs as $staff)
                <option value="{{$staff->id}}">{{$staff->full_name}}</option>
                @endforeach
            </select>

            @if($errors->has('staff'))
            <span class="help-block">
                <strong>{{$errors->first('staff')}}</strong>
            </span>
            @endif
        </div>
    </div>