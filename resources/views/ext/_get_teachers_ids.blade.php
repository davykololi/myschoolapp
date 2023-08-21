                <select id="teacher" type="text" value="{{old('teacher')}}" class="py-1 bg-gray-800 text-white w-full md:w-[220px] my-1 focus:shadow-outline focus:bg-black" name="teacher" data-te-select-init data-te-select-filter="true">
                    <option value="">Select Teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{$teacher->id}}" data-te-select-icon="{{ $teacher->image_url }}">
                            {{$teacher->full_name}}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('teacher'))
                <span class="help-block">
                    <strong>{{$errors->first('teacher')}}</strong>
                </span>
                @endif