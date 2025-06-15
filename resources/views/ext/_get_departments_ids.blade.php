                            <select id="department_id" type="type" value="{{old('department_id')}}" class="select-form-one" name="department_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Department">
                                @foreach ($departments as $department)
                                    <option class="font-bold text-sm" value="{{$department->id}}">
                                        {{$department->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('department_id'))
                            <span class="text-[red]">
                                <strong>{{$errors->first('department_id')}}</strong>
                            </span>
                            @endif
                        