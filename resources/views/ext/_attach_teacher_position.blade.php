    
            <select id="position" type="text" value="{{old('position')}}" class="form-input-one uppercase" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                <option value="{{ __('Class Teacher') }}">{{ __('Class Teacher') }}</option>
                <option value="{{ __('Head Teacher') }}">{{ __('Head Teacher') }}</option>
                <option value="{{ __('Deputy Head Teacher') }}">{{ __('Deputy Head Teacher') }}</option>
                <option value="{{ __('Head Science Department') }}">{{ __('Head Science Department') }}</option>
                <option value="{{ __('Assistant Head Science Department') }}">{{ __('Assistant Head Science Department') }}</option>
                <option value="{{ __('Head Humanity Department') }}">{{ __('Head Humanity Department') }}</option>
                <option value="{{ __('Assistant Head Humanity Department') }}">{{ __('Assistant Head Humanity Department') }}</option>
                <option value="{{ __('Head Mathematics Department') }}">{{ __('Head Mathematics Department') }}</option>
                <option value="{{ __('Assistant Head Mathematics Department') }}">{{ __('Assistant Head Mathematics Department') }}</option>
                <option value="{{ __('Head Languages Department') }}">{{ __('Head Languages Department') }}</option>
                <option value="{{ __('Assistant Head Languages Department') }}">{{ __('Assistant Head Languages Department') }}</option>
                <option value="{{ __('Staff Teacher') }}">{{ __('Staff Teacher') }}</option>
            </select>
            @if($errors->has('position'))
            <span class="help-block">
                <strong>{{$errors->first('position')}}</strong>
            </span>
            @endif