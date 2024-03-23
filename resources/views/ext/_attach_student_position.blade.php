    
            <select id="position" type="text" value="{{old('position')}}" class="form-input-one uppercase" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                <option value="{{ __('Ordinary Student') }}">{{ __('Ordinary Student') }}</option>
                <option value="{{ __('Student Leader') }}">{{ __('Student Leader') }}</option>
                <option value="{{ __('Deputy Student Leader') }}">{{ __('Assistant Student Leader') }}</option>
                <option value="{{ __('Class Prefect') }}">{{ __('Class Prefect') }}</option>
                <option value="{{ __('Assistant Class Prefect') }}">{{ __('Assistant Class Prefect') }}</option>
                <option value="{{ __('Time Keeper') }}">{{ __('Time Keeper') }}</option>
            </select>
            @if($errors->has('position'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('position')}}</strong>
            </span>
            @endif