    
            <select id="position" type="text" value="{{old('position')}}" class="form-input-one uppercase" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                <option value="{{ __('Student Registrar') }}">{{ __('Students Registrar') }}</option>
                <option value="{{ __('Academic Registrar') }}">{{ __('Academic Registrar') }}</option>
                <option value="{{ __('Exam Registrar') }}">{{ __('Exam Registrar') }}</option>
                <option value="{{ __('Senior Admin') }}">{{ __('Senior Admin') }}</option>
                <option value="{{ __('Deputy Senior Admin') }}">{{ __('Deputy Senior Admin') }}</option>
                <option value="{{ __('Ordinary Admin') }}">{{ __('Ordinary Admin') }}</option>
                <option value="{{ __('Library Admin') }}">{{ __('Library Admin') }}</option>
                <option value="{{ __('Accounts Admin') }}">{{ __('Accounts Admin') }}</option>
                <option value="{{ __('Data Officer') }}">{{ __('Data Officer') }}</option>
            </select>

            @if($errors->has('position'))
            <span class="help-block">
                <strong>{{$errors->first('position')}}</strong>
            </span>
            @endif