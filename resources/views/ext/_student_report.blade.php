                <select id="name" type="text" value="{{old('name')}}" class="py-1 bg-gray-800 text-white w-full md:w-64 my-1 focus:shadow-outline focus:bg-black" name="name" data-te-select-init data-te-select-filter="true">
                    <option value="">Select Student</option>
                    @foreach ($students as $student)
                        <option name="name" value="{{$student->full_name}}" data-te-select-icon="{{ $student->image_url }}">
                            {{$student->full_name}}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif