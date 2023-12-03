                    
                            <select id="stream_section" type="stream_section" value="{{old('stream_section')}}" class="form-control" name="stream_section" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Section">
                                @foreach ($streamSections as $streamSection)
                            <option value="{{$streamSection->id}}">{{$streamSection->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stream_section'))
                                <span class="help-block">
                                    <strong>{{$errors->first('stream_section')}}</strong>
                                </span>
                            @endif
                        