                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Farm</label>
                        <div class="col-md-10">
                            <select id="farm_category" type="farm_category" value="{{old('farm_category')}}" class="form-control" name="farm_category">
                                <option value="">Select Farm</option>
                                @foreach ($categoryFarms as $categoryFarm)
                                    <option value="{{$categoryFarm->id}}">{{$categoryFarm->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('farm_category'))
                                <span class="help-block">
                                    <strong>{{$errors->first('farm_category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>