                    <select id="stream" type="stream" value="{{old('stream')}}" class="select-form-one" name="stream" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Stream">
                        @foreach ($streams as $stream)
                        <option value="{{$stream->id}}">{{$stream->name}}</option>
                        @endforeach
                    </select>

                    @if($errors->has('stream'))
                        <span class="help-block">
                            <span class="text-danger">{{$errors->first('stream')}}</span>
                        </span>
                    @endif