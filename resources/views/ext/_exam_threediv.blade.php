                            <select id="exam_three" type="exam_three" value="{{old('exam_three')}}" class="form-control" name="exam_three">
                                <option value="">Select Third Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('exam_three'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('exam_three')}}</span>
                                </span>
                            @endif