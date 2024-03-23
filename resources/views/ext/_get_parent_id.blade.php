                <select id="parent" type="text" value="{{old('parent')}}" class="form-input-one" name="parent" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Parent">
                    @foreach ($parents as $parent)
                        <option class="w-full" value="{{$parent->id}}" data-te-select-icon="{{ $parent->image_url }}">
                            {{ $parent->user->full_name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('parent'))
                <span class="help-block">
                    <strong class="text-red-700">{{$errors->first('parent')}}</strong>
                </span>
                @endif