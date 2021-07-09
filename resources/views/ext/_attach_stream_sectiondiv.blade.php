                    <div class="form-group">
                        <label class="control-label col-sm-2" >Stream</label>
                        <div class="col-md-10">
                            <select id="stream_section" type="stream_section" value="{{old('stream_section')}}" class="form-control" name="stream_section">
                                <option value="">Select Exam</option>
                                @foreach ($streamSections as $streamSection)
                            <option value="{{$streamSection->id}}">{{$streamSection->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stream_section'))
                                <span class="help-block">
                                    <strong>{{$errors->first('stream_section')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>