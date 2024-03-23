    
            <select id="position" type="text" value="{{old('position')}}" class="form-input-one uppercase" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                <option value="{{ __('Senior Accountant') }}">{{ __('Senior Accountant') }}</option>
                <option value="{{ __('Deputy Senior Accountant') }}">{{ __('Deputy Accountant') }}</option>
                <option value="{{ __('Accounts Auditor') }}">{{ __('Accounts Auditor') }}</option>
                <option value="{{ __('Ordinary Accountant') }}">{{ __('Ordinary Accountant') }}</option>
            </select>

            @if($errors->has('position'))
            <span class="help-block">
                <strong class="text-danger">{{$errors->first('position')}}</strong>
            </span>
            @endif