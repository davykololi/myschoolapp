                            <select id="department" type="department" value="{{old('department')}}" class="select-form-one" name="department" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Department">
                                @foreach ($departments as $department)
                                    <option class="font-bold text-sm" value="{{$department->id}}">
                                        {{$department->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('department'))
                            <span class="text-[red]">
                                <strong>{{$errors->first('department')}}</strong>
                            </span>
                            @endif
                        