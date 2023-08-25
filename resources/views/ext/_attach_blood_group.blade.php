    
            <select id="blood_group" type="blood_group" value="{{old('blood_group')}}" class="form-input-one" name="blood_group">
                <option value="">Select Blood Group</option>
                <option value="{{ __('A+') }}">{{ __('A+') }}</option>
                <option value="{{ __('B+') }}">{{ __('B+') }}</option>
                <option value="{{ __('AB') }}">{{ __('AB') }}</option>
                <option value="{{ __('O+') }}">{{ __('O+') }}</option>
            </select>
            @if($errors->has('blood_group'))
            <span class="help-block">
                <strong>{{$errors->first('blood_group')}}</strong>
            </span>
            @endif