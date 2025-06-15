                <select id="department_id" type="text" value="{{old('department_id')}}" class="select-form-one" name="department_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Department">
                    @foreach ($departments as $department)
                        <option class="w-full" value="{{$department->id}}">
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('department_id'))
                <span class="help-block">
                    <strong>{{$errors->first('department_id')}}</strong>
                </span>
                @endif