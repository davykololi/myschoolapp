                            <select id="exam_one" type="exam_one" value="{{old('exam_one')}}" class="form-control" name="exam_one">
                                <option value="">Select First Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('exam_one'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('exam_one')}}</span>
                                </span>
                            @endif