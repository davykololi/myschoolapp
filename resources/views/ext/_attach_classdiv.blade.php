                            <select id="class_id" type="text" value="{{old('class_id')}}" class="select-form-one" name="class_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Class">
                                @foreach ($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('class_id'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('class_id')}}</span>
                                </span>
                            @endif
                      
                        