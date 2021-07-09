                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Class Subject</label>
                        <div class="col-md-10">
                            <select id="standard_subject" type="standard_subject" value="{{old('standard_subject')}}" class="form-control" name="standard_subject">
                                <option value="">Select Subject</option>
                                @foreach ($standardSubjects as $standardSubject)
                            <option value="{{$standardSubject->id}}">{{$standardSubject->desc}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('std_subject'))
                                <span class="help-block">
                                    <strong>{{$errors->first('standard_subject')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>