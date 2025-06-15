                <select id="section_id" type="text" value="{{old('section_id')}}" class="w-full bg-transparent" name="section_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Section">
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>

                @if($errors->has('section_id'))
                <span class="help-block">
                    <strong>{{$errors->first('section_id')}}</strong>
                </span>
                @endif