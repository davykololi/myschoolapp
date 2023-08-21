    
            <select id="student_role" type="student_role" value="{{old('student_role')}}" class="leading-tight" name="student_role">
                <option value="">Select Role</option>
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