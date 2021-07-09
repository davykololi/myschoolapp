                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory</label>
                        <div class="col-md-10">
                            <select id="dormitory" type="text" value="{{old('dormitory')}}" class="form-control" name="dormitory">
                                <option value="">Select Dormitory</option>
                                @foreach ($dormitories as $dormitory)
                            <option value="{{$dormitory->id}}">{{$dormitory->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('dormitory'))
                                <span class="help-block">
                                    <strong>{{$errors->first('dormitory')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>