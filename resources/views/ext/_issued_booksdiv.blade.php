                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach </label>
                        <div class="col-md-10">
                            <select id="subject_id" type="text" value="{{old('subject_id')}}" class="form-control" name="subject_id">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @include('ext._errors_subject')
                        </div>
                    </div>