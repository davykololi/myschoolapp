                <select id="department" type="text" value="{{old('department')}}" class="select-form-one" name="department" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Department">
                    @foreach ($departments as $department)
                        <option class="w-full" value="{{$department->id}}">
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('department'))
                <span class="help-block">
                    <strong>{{$errors->first('department')}}</strong>
                </span>
                @endif