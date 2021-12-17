                            <select id="exam" type="exam" value="{{old('exam')}}" class="form-control" name="exam">
                                <option value="">Select Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                            @include('ext._errors_exam')
                        