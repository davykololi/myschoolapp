    
            <select id="position" type="text" value="{{old('position')}}" class="leading-tight" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                <option value="{{ __('Tea Server') }}">{{ __('Tea Server') }}</option>
                <option value="{{ __('School Secretary') }}">{{ __('Secretary') }}</option>
                <option value="{{ __('Gardener') }}">{{ __('Gardener') }}</option>
                <option value="{{ __('Senior Cook') }}">{{ __('Senior Cook') }}</option>
                <option value="{{ __('Ordinary Cook') }}">{{ __('Ordinary Cook') }}</option>
                <option value="{{ __('Senior Security') }}">{{ __('Senior Security') }}</option>
                <option value="{{ __('Ordinary Security') }}">{{ __('Ordinary Security') }}</option>
            </select>
            @if($errors->has('position'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('position')}}</strong>
            </span>
            @endif