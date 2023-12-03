                    
                            <select id="library" type="text" value="{{old('library')}}" class="form-control" name="library" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Library">
                                @foreach ($libraries as $library)
                            <option value="{{$library->id}}">{{$library->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('library'))
                                <span class="help-block">
                                    <strong>{{$errors->first('library')}}</strong>
                                </span>
                            @endif
                        