                <select id="parent_id" type="text" value="{{old('parent_is')}}" class="input-three" name="parentinput-three_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Parent">
                    @foreach ($parents as $parent)
                        <option class="w-full" value="{{$parent->id}}" data-te-select-icon="{{ $parent->image_url }}">
                            {{ $parent->user->full_name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('parent_id'))
                <span class="help-block">
                    <strong class="text-red-700">{{$errors->first('parent-id')}}</strong>
                </span>
                @endif