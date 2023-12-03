    
            <select id="lesson" type="lesson" value="{{old('lesson')}}" class="form-control" name="lesson" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Lesson">
                @foreach ($lessons as $lesson)
                <option value="{{$lesson->id}}">{{$lesson->name}}</option>
                @endforeach
            </select>
            @if($errors->has('lesson'))
            <span class="help-block">
                <strong>{{$errors->first('lesson')}}</strong>
            </span>
            @endif
        