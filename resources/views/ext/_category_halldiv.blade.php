                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="hall_category" type="hall_category" value="{{old('hall_category')}}" class="form-control" name="hall_category">
                                <option value="">Select Field</option>
                                @foreach ($categoryHalls as $key => $categoryHall)
                                    <option value="{{$categoryHall->id}}">{{$categoryHall->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('hall_category'))
                                <span class="help-block">
                                    <strong>{{$errors->first('hall_category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>