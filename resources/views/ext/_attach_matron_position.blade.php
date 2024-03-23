            <select id="position" type="text" value="{{old('position')}}" class="form-control" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                <option value="{{ __('Senior Matron') }}">{{ __('Senior Matron') }}</option>
                <option value="{{ __('Assistant Senior Matron') }}">{{ __('Assistant Senior Matron') }}</option>
                <option value="{{ __('Ordinary Matron') }}">{{ __('Ordinary Matron') }}</option>
            </select>
            @if($errors->has('position'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('position')}}</strong>
            </span>
            @endif