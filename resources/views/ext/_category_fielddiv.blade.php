                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="field_category" type="field_category" value="{{old('field_category')}}" class="form-control" name="field_category">
                                <option value="">Select Field</option>
                                @foreach ($categoryFields as $key => $categoryField)
                                    <option value="{{$categoryField->id}}">{{$categoryField->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('field_category'))
                                <span class="help-block">
                                    <strong>{{$errors->first('field_category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>