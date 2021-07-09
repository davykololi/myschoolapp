                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Year</label>
                        <div class="col-md-10">
                            <select id="year" type="year" value="{{old('year')}}" class="form-control" name="year" required>
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{$year->id}}">{{$year->year}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('year'))
                            <span class="help-block">
                                <strong>{{$errors->first('year')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>