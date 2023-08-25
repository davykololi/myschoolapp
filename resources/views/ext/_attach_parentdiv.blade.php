                <select id="parent" type="text" value="{{old('parent')}}" class="form-input-one" name="parent" data-te-select-init data-te-select-filter="true">
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