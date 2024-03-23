                <select id="student" type="text" value="{{old('student')}}" class="" name="student" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Student">
                    @foreach ($students as $student)
                        <option class="w-full text-sm" value="{{$student->id}}">{{ $student->user->full_name }}</option>
                    @endforeach
                </select>

                @error('student')
                <span class="text-red-700">{{ $message }}</span>
                @enderror
                