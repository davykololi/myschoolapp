			@if($errors->has('assignment'))
            <span class="help-block">
                <strong>{{$errors->first('assignment')}}</strong>
            </span>
            @endif