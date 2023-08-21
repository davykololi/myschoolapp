    
            <select id="accountant_role" type="accountant_role" value="{{old('accountant_role')}}" class="form-control" name="accountant_role">
                <option value="">Select Role</option>
                <option value="{{ __('senioraccountant') }}">{{ __('Senior Accountant') }}</option>
                <option value="{{ __('deputysenioraccountant') }}">{{ __('Deputy Accountant') }}</option>
                <option value="{{ __('accountsauditor') }}">{{ __('Accounts Auditor') }}</option>
                <option value="{{ __('ordinaryaccountant') }}">{{ __('Ordinary Accountant') }}</option>
            </select>

            @if($errors->has('accountant_role'))
            <span class="help-block">
                <strong>{{$errors->first('accountant_role')}}</strong>
            </span>
            @endif