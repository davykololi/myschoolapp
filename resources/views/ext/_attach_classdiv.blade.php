                            <select id="class" type="class" value="{{old('class')}}" class="form-control" name="class">
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
                        