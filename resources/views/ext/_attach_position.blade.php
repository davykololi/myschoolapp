    
            <select id="position" type="text" value="{{old('position')}}" class="form-input-one uppercase" name="position" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Position">
                @foreach($positions as $position)
                    <option value="{{ $position->value }}">{{ $position->value }}</option>
                @endforeach
            </select>
            <x-position-error/>