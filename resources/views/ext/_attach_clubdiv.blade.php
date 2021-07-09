                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Club</label>
                        <div class="col-md-10">
                            <select id="club" type="club" value="{{old('club')}}" class="form-control" name="club">
                                <option value="">Select Club</option>
                                @foreach ($clubs as $club)
                                    <option value="{{$club->id}}">{{$club->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('club'))
                                <span class="help-block">
                                    <strong>{{$errors->first('club')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>