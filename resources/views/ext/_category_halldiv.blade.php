                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="hall_type" type="hall_type" value="{{old('hall_type')}}" class="form-control" name="hall_type">
                                <option value="{{__('Dinning Hall')}}">{{__('Dinning Hall')}}</option>
                                <option value="{{__('Theatre Hall')}}">{{__('Theatre Hall')}}</option>
                                <option value="{{__('Entertainment Hall')}}">{{__('Entertainment Hall')}}</option>
                            </select>

                            @if($errors->has('hall_type'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('hall_type')}}</span>
                                </span>
                            @endif
                        </div>
                    </div>