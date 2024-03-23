    
            <select id="blood_group" type="blood_group" value="{{old('blood_group')}}" class="user-form-input" name="blood_group" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Blood Group">
                <option value="{{ __('A+') }}">{{ __('A-') }}</option>
                <option value="{{ __('A+') }}">{{ __('A+') }}</option>
                <option value="{{ __('B+') }}">{{ __('B-') }}</option>
                <option value="{{ __('B+') }}">{{ __('B+') }}</option>
                <option value="{{ __('AB') }}">{{ __('AB-') }}</option>
                <option value="{{ __('AB') }}">{{ __('AB+') }}</option>
                <option value="{{ __('O+') }}">{{ __('O-') }}</option>
                <option value="{{ __('O+') }}">{{ __('O+') }}</option>
            </select>
            @if($errors->has('blood_group'))
            <span class="help-block">
                <strong class="text-danger">{{$errors->first('blood_group')}}</strong>
            </span>
            @endif