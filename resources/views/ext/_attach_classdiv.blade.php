                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Class</label>
                        <div class="col-md-10">
                            <select id="class" type="class" value="{{old('class')}}" class="form-control" name="class">
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('class'))
                                <span class="help-block">
                                    <strong>{{$errors->first('class')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>