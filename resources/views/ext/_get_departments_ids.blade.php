                            <select id="department" type="department" value="{{old('department')}}" class="py-1 bg-gray-800 text-white w-full md:w-[220px] my-1 focus:shadow-outline focus:bg-black" name="term">
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option class="font-bold" value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('department'))
                            <span class="text-[red]">
                                <strong>{{$errors->first('department')}}</strong>
                            </span>
                            @endif
                        