                <select id="parent" type="text" value="{{old('parent')}}" class="py-1 bg-gray-800 text-white w-full my-1 focus:shadow-outline focus:bg-black" name="parent" data-te-select-init data-te-select-filter="true">
                    <option value="">Select Parent</option>
                    @foreach ($parents as $parent)
                        <option class="w-full" value="{{$parent->id}}" data-te-select-icon="{{ $parent->image_url }}">
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('parent'))
                <span class="help-block">
                    <strong>{{$errors->first('parent')}}</strong>
                </span>
                @endif