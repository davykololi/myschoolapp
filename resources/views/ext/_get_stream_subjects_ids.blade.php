                            <select id="subject" type="subject" value="{{old('subject')}}" class="py-1 bg-gray-800 text-white w-full md:w-[220px] my-1 focus:shadow-outline focus:bg-black" name="exam">
                                <option value="">Select Subject</option>
                                @if(!empty($streamSubjects))
                                @foreach( $streamSubjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if($errors->has('subject'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('subject')}}</span>
                                </span>
                            @endif
                        