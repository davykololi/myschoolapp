    
            <select id="school_type" type="school_type" value="{{old('school_type')}}" class="form-control" name="school_type" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Category">
                <option value="{{ __('National School') }}">{{ __('National School') }}</option>
                <option value="{{ __('County School') }}">{{ __('County School') }}</option>
                <option value="{{ __('Extra County School') }}">{{ __('Extra County School') }}</option>
                <option value="{{ __('Private School') }}">{{ __('Private School') }}</option>
            </select>

            @if($errors->has('school_type'))
            <span class="help-block">
                <strong>{{$errors->first('school_type')}}</strong>
            </span>
            @endif