    
            <select id="staff_role" type="staff_role" value="{{old('staff_role')}}" class="leading-tight" name="staff_role" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Role">
                <option value="{{ __('teaserver') }}">{{ __('Tea Server') }}</option>
                <option value="{{ __('schoolsecretary') }}">{{ __('Secretary') }}</option>
                <option value="{{ __('gardener') }}">{{ __('Gardener') }}</option>
                <option value="{{ __('seniorcook') }}">{{ __('Senior Cook') }}</option>
                <option value="{{ __('ordinarycook') }}">{{ __('Ordinary Cook') }}</option>
                <option value="{{ __('seniorsecurity') }}">{{ __('Senior Security') }}</option>
                <option value="{{ __('ordinarysecurity') }}">{{ __('Ordinary Security') }}</option>
            </select>
            @if($errors->has('staff_role'))
            <span class="help-block">
                <strong>{{$errors->first('staff_role')}}</strong>
            </span>
            @endif