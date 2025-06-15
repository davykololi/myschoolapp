                            <select id="section_id" type="type" value="{{old('section_id')}}" class="form-control" name="section_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Section">
                                @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('section_id'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('section_id')}}</span>
                                </span>
                            @endif
                        