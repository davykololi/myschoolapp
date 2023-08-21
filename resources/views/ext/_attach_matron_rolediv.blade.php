            <select id="matron_role" type="text" value="{{old('matron_role')}}" class="form-control" name="matron_role">
                <option value="">Select Role</option>
                <option value="{{ __('Senior Matron') }}">{{ __('Senior Matron') }}</option>
                <option value="{{ __('Assistant Matron') }}">{{ __('Assistant Matron') }}</option>
            </select>
            @if($errors->has('matron_role'))
            <span class="help-block">
                <strong>{{$errors->first('matron_role')}}</strong>
            </span>
            @endif