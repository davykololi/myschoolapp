                <select id="student" type="text" value="{{old('student')}}" class="select-form-one" name="student" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Student">
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