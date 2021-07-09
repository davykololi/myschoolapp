			@if($errors->has('student'))
            <span class="help-block">
                <strong>{{$errors->first('student')}}</strong>
            </span>
            @endif