                            <select id="class" type="class" value="{{old('class')}}" class="py-1 bg-gray-800 text-white w-full md:w-[220px] my-1 focus:shadow-outline focus:bg-black" name="class" data-te-select-init data-te-select-filter="true">
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('class'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('class')}}</span>
                                </span>
                            @endif
                      
                        