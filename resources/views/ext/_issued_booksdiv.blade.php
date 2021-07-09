                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach </label>
                        <div class="col-md-10">
                            <select id="subject" type="subject" value="{{old('subject')}}" class="form-control" name="subject">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @include('ext._errors_subject')
                        </div>
                    </div>