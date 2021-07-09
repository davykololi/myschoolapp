                    <div class="form-group">
                        <label class="control-label col-sm-2" >Intake Name</label>
                        <div class="col-md-10">
                            <select id="intake" type="text" value="{{old('intake')}}" class="form-control" name="intake">
                                <option value="">Select Intake</option>
                                @foreach ($intakes as $intake)
                            <option value="{{$intake->id}}">{{$intake->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('intake'))
                                <span class="help-block">
                                    <strong>{{$errors->first('intake')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>