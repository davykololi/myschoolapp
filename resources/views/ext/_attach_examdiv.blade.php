                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Exam</label>
                        <div class="col-md-10">
                            <select id="exam" type="exam" value="{{old('exam')}}" class="form-control" name="exam">
                                <option value="">Select Exam</option>
                                @foreach ($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                            @include('ext._errors_exam')
                        </div>
                    </div>