                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Stream</label>
                        <div class="col-md-10">
                            <select id="stream" type="stream" value="{{old('stream')}}" class="form-control" name="stream">
                                <option value="">Select Stream</option>
                                @foreach ($streams as $stream)
                                    <option value="{{$stream->id}}">{{$stream->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('stream'))
                                <span class="help-block">
                                    <strong>{{$errors->first('stream')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>