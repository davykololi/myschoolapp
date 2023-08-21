                <select id="student" type="text" value="{{old('student')}}" class="py-1 bg-gray-800 text-white w-full my-1 focus:shadow-outline focus:bg-black" name="student" data-te-select-init data-te-select-filter="true">
                    <option value="">Select Student</option>
                    @foreach ($students as $student)
                        <option class="w-full" value="{{$student->id}}" data-te-select-icon="{{ $student->image_url }}">
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('student'))
                <span class="help-block">
                    <strong>{{$errors->first('student')}}</strong>
                </span>
                @endif