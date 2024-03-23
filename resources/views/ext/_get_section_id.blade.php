                <select id="section" type="text" value="{{old('section')}}" class="w-full bg-transparent" name="section" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Section">
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>

                @if($errors->has('section'))
                <span class="help-block">
                    <strong>{{$errors->first('section')}}</strong>
                </span>
                @endif