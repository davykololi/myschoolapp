                            <select id="section" type="section" value="{{old('section')}}" class="form-control" name="section" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Section">
                                @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('section'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('section')}}</span>
                                </span>
                            @endif
                        