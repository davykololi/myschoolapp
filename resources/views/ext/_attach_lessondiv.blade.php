    
            <select id="lesson_id" type="text" value="{{old('lesson_id')}}" class="form-control" name="lesson_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Lesson">
                @foreach ($lessons as $lesson)
                <option value="{{$lesson->id}}">{{$lesson->name}}</option>
                @endforeach
            </select>
            @if($errors->has('lesson_id'))
            <span class="help-block">
                <strong>{{$errors->first('lesson_id')}}</strong>
            </span>
            @endif
        