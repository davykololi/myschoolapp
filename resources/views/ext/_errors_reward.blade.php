			@if($errors->has('reward'))
            <span class="help-block">
                <strong>{{$errors->first('reward')}}</strong>
            </span>
            @endif