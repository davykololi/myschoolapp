                            <select id="stream" type="stream" value="{{old('stream')}}" class="form-control" name="stream">
                                <option value="">Select Stream</option>
                                @foreach ($streams as $stream)
                                    <option value="{{$stream->id}}">{{$stream->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('stream'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('stream')}}</span>
                                </span>
                            @endif