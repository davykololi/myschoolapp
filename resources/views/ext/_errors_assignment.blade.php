			@if($errors->has('assignment_id'))
            <span class="help-block">
                <strong>{{$errors->first('assignment_id')}}</strong>
            </span>
            @endif