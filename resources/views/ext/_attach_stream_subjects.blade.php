                        <select id="subject_id" type="subject_id" value="{{old('subject_id')}}" class="form-control" name="subject_id">
                            <option value="">Select Subject</option>
                            @foreach ($streamSubjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('subject_id'))
                            <span class="help-block">
                                <span class="text-danger">{{$errors->first('subject_id')}}</span>
                            </span>
                        @endif