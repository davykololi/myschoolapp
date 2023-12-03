                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Farm</label>
                        <div class="col-md-10">
                            <select id="farm_type" type="farm_type" value="{{old('farm_type')}}" class="form-control" name="farm_type">
                                <option value="{{__('Students Projects Farm')}}">{{__('Students Projects Farm')}}</option>
                                <option value="{{__('School Projects Farm')}}">{{__('School Projects Farm')}}</option>
                                <option value="{{__('School Agricultural Farm')}}">{{__('School Agricultural Farm')}}</option>
                            </select>
                            @if($errors->has('farm_type'))
                                <span class="help-block">
                                    <strong>{{$errors->first('farm_type')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>