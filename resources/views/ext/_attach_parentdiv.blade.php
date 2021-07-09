    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Parent</label>
        <div class="col-md-10">
            <select id="parent" type="parent" value="{{old('parent')}}" class="form-control" name="parent">
                <option value="">Select Parent</option>
                @foreach ($parents as $parent)
                <option value="{{$parent->id}}">{{$parent->full_name}}</option>
                @endforeach
            </select>

            @if($errors->has('parent'))
            <span class="help-block">
                <strong>{{$errors->first('parent')}}</strong>
            </span>
            @endif
        </div>
    </div>