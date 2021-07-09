    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Meeting</label>
        <div class="col-md-10">
            <select id="meeting" type="meeting" value="{{old('meeting')}}" class="form-control" name="meeting">
                <option value="">Select Meeting</option>
                @foreach ($meetings as $meeting)
                <option value="{{$meeting->id}}">{{$meeting->name}}</option>
                @endforeach
            </select>

            @if($errors->has('meeting'))
            <span class="help-block">
                <strong>{{$errors->first('meeting')}}</strong>
            </span>
            @endif
        </div>
    </div>