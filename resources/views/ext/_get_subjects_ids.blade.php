                            <select id="subject" type="subject" value="{{old('subject')}}" class="w-full bg-transparent" name="subject" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Subject">
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subject'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('subject')}}</span>
                                </span>
                            @endif
                        