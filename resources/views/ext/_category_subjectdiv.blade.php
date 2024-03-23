    
            <select id="type" type="text" value="{{old('type')}}" class="leading-tight" name="type" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Category">
                <option value="{{ __('Mathematics') }}">{{ __('Mathematics') }}</option>
                <option value="{{ __('Languages') }}">{{ __('Languages') }}</option>
                <option value="{{ __('Sciences') }}">{{ __('Sciences') }}</option>
                <option value="{{ __('Humanities') }}">{{ __('Humanities') }}</option>
                <option value="{{ __('Religious') }}">{{ __('Religious') }}</option>
            </select>
            @if($errors->has('type'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('type')}}</strong>
            </span>
            @endif