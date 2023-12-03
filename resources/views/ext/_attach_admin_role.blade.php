    
            <select id="admin_role" type="admin_role" value="{{old('admin_role')}}" class="form-input-one uppercase" name="admin_role" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Role">
                <option value="{{ __('studentregistrar') }}">{{ __('Students Registrar') }}</option>
                <option value="{{ __('academicregistrar') }}">{{ __('Academic Registrar') }}</option>
                <option value="{{ __('examregistrar') }}">{{ __('Exam Registrar') }}</option>
                <option value="{{ __('senioradmin') }}">{{ __('Senior Admin') }}</option>
                <option value="{{ __('deputysenioradmin') }}">{{ __('Deputy Senior Admin') }}</option>
                <option value="{{ __('ordinaryadmin') }}">{{ __('Ordinary Admin') }}</option>
            </select>

            @if($errors->has('admin_role'))
            <span class="help-block">
                <strong>{{$errors->first('admin_role')}}</strong>
            </span>
            @endif