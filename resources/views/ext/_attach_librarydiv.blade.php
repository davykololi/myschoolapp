                    
                            <select id="library_id" type="text" value="{{old('library_id')}}" class="form-control" name="library_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Library">
                                @foreach ($libraries as $library)
                            <option value="{{$library->id}}">{{$library->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('library_id'))
                                <span class="help-block">
                                    <strong>{{$errors->first('library_id')}}</strong>
                                </span>
                            @endif
                        