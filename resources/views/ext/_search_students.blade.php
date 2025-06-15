                <select id="student_id" type="text" value="{{old('student_id')}}" class="" name="student_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Student">
                    @foreach ($students as $student)
                        <option class="w-full text-sm" value="{{$student->id}}">{{ $student->user->full_name }}</option>
                    @endforeach
                </select>

                @error('student_id')
                <span class="text-red-700">{{ $message }}</span>
                @enderror
                