                            <select id="exam_id" type="text" value="{{old('exam_id')}}" class="w-full bg-transparent" name="exam_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Exam">
                                @foreach ($exams as $exam)
                                @if($exam->term->status === 1)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @include('ext._errors_exam')
                        