            <select id="librarian_role" type="librarian_role" value="{{old('librarian_role')}}" class="form-control" name="librarian_role">
                <option value="">Select Role</option>
                <option value="{{ __('seniorlibrarian') }}">{{ __('Senior Librarian') }}</option>
                <option value="{{ __('assistantseniorlibrarian') }}">{{ __('Assistant Librarian') }}</option>
                <option value="{{ __('libraryauditor') }}">{{ __('Library Auditor') }}</option>
                <option value="{{ __('ordinarylibrarian') }}">{{ __('Ordinary Librarian') }}</option>
            </select>

            @if($errors->has('librarian_role'))
            <span class="help-block">
                <strong>{{$errors->first('librarian_role')}}</strong>
            </span>
            @endif