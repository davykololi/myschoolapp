                            <select id="section" type="section" value="{{old('section')}}" class="form-control" name="section">
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('section'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('section')}}</span>
                                </span>
                            @endif
                        