                <select id="student_id" type="text" value="{{old('student_id')}}" class="select-form-one" name="student_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Student">
                    @foreach ($students as $student)
                        <option class="w-full" value="{{$student->id}}" data-te-select-icon="{{ $student->image_url }}">
                            {{ $student->user->full_name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('student_id'))
                <span class="help-block">
                    <strong>{{$errors->first('student_id')}}</strong>
                </span>
                @endif