                <select id="name" type="text" value="{{old('name')}}" class="w-full bg-transparent" name="name" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Student">
                    @foreach ($students as $student)
                        <option name="name" value="{{$student->user->full_name}}" data-te-select-icon="{{ $student->image_url }}">
                            {{$student->user->full_name}}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif