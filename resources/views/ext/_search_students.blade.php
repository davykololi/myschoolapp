                <select id="student" type="text" value="{{old('student')}}" class="" name="student" data-te-select-init data-te-select-filter="true">
                    <option value="">Select Student</option>
                    @foreach ($students as $student)
                        <option class="w-full " value="{{$student->id}}">{{ $student->full_name }}</option>
                    @endforeach
                </select>

                @if($errors->has('student'))
                <span class="help-block">
                    <strong>{{$errors->first('student')}}</strong>
                </span>
                @endif