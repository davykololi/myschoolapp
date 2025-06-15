                        <select id="subject_id" type="subject_id" value="{{old('subject_id')}}" class="bg-transparent" name="subject_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Subject">
                            @if(!empty($streamSubjects))
                            @foreach ($streamSubjects as $streamSubject)
                                <option value="{{ $streamSubject->id}}">
                                    {{ $streamSubject->name }}
                                </option>
                            @endforeach
                            @endif
                        </select>
                        @if($errors->has('subject_id'))
                            <span class="help-block">
                                <span class="text-danger">{{$errors->first('subject_id')}}</span>
                            </span>
                        @endif