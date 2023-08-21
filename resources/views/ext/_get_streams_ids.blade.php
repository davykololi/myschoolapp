                    <select id="stream" type="stream" value="{{old('stream')}}" class="py-1 bg-gray-800 text-white w-full md:w-[220px] my-1 focus:shadow-outline focus:bg-black" name="stream" data-te-select-init data-te-select-filter="true">
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