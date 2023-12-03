                            <select id="class" type="class" value="{{old('class')}}" class="select-form-one" name="class" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Class">
                                @foreach ($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('class'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('class')}}</span>
                                </span>
                            @endif
                      
                        