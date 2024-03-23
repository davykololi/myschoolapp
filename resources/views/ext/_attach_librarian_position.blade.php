            <select id="position" type="text" value="{{old('position')}}" class="form-control" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                <option value="{{ __('Senior Librarian') }}">{{ __('Senior Librarian') }}</option>
                <option value="{{ __('Deputy Senior Librarian') }}">{{ __('Deputy Senior Librarian') }}</option>
                <option value="{{ __('Library Auditor') }}">{{ __('Library Auditor') }}</option>
                <option value="{{ __('Ordinary Librarian') }}">{{ __('Ordinary Librarian') }}</option>
            </select>

            @if($errors->has('position'))
            <span class="help-block">
                <strong>{{$errors->first('position')}}</strong>
            </span>
            @endif