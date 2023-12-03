                        <select id="subject_id" type="subject_id" value="{{old('subject_id')}}" class="form-control" name="subject_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Subject">
                            @foreach ($streamSubjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('subject_id'))
                            <span class="help-block">
                                <span class="text-danger">{{$errors->first('subject_id')}}</span>
                            </span>
                        @endif