                            <select id="subject_id" type="text" value="{{old('subject_id')}}" class="w-full bg-transparent" name="subject_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Subject">
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subject_id'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('subject_id')}}</span>
                                </span>
                            @endif
                        