    
            <select id="student_role" type="student_role" value="{{old('student_role')}}" class="form-input-one uppercase" name="student_role" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Role">
                <option value="{{ __('ordinarystudent') }}">{{ __('Ordinary Student') }}</option>
                <option value="{{ __('studentleader') }}">{{ __('Student Leader') }}</option>
                <option value="{{ __('deputystudentleader') }}">{{ __('Assistant Student Leader') }}</option>
                <option value="{{ __('streamprefect') }}">{{ __('Class Prefect') }}</option>
                <option value="{{ __('assistantstreamprefect') }}">{{ __('Assistant Class Prefect') }}</option>
                <option value="{{ __('timekeeper') }}">{{ __('Time Keeper') }}</option>
            </select>
            @if($errors->has('student_role'))
            <span class="help-block">
                <strong>{{$errors->first('student_role')}}</strong>
            </span>
            @endif