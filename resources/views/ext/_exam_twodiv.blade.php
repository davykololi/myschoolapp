                            <select id="exam_two" type="exam_two" value="{{old('exam_two')}}" class="form-control" name="exam_two">
                                <option value="">Select Second Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('exam_two'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('exam_two')}}</span>
                                </span>
                            @endif