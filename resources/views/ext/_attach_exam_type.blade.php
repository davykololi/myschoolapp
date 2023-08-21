            <select id="exam_type" type="exam_type" value="{{old('exam_type')}}" class="form-control" name="exam_type">
                <option value="">Select Type</option>
                <option value="{{ __('Mid Term Examinations') }}">{{ __('Mid Term Examinations') }}</option>
                <option value="{{ __('End Term Examinations') }}">{{ __('End Term Examinations') }}</option>
                <option value="{{ __('Mock Examinations') }}">{{ __('Mock Examinations') }}</option>
            </select>

            @if($errors->has('exam_type'))
            <span class="help-block">
                <strong>{{$errors->first('exam_type')}}</strong>
            </span>
            @endif
        