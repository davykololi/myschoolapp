                    <select id="stream_id" type="text" value="{{old('stream_id')}}" class="select-form-one" name="stream_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Stream">
                        @foreach ($streams as $stream)
                        <option value="{{$stream->id}}">{{$stream->name}}</option>
                        @endforeach
                    </select>

                    @if($errors->has('stream_id'))
                        <span class="help-block">
                            <span class="text-danger">{{$errors->first('stream_id')}}</span>
                        </span>
                    @endif