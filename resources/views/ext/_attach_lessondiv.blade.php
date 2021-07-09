    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Lesson</label>
        <div class="col-md-10">
            <select id="lesson" type="lesson" value="{{old('lesson')}}" class="form-control" name="lesson">
                <option value="">Select Lesson</option>
                @foreach ($lessons as $lesson)
                <option value="{{$lesson->id}}">{{$lesson->name}}</option>
                @endforeach
            </select>

            @if($errors->has('lesson'))
            <span class="help-block">
                <strong>{{$errors->first('lesson')}}</strong>
            </span>
            @endif
        </div>
    </div>