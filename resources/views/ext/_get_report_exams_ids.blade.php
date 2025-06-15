                            <select id="exam_id" type="text" value="{{old('exam_id')}}" class="py-1 bg-gray-800 text-white w-full md:w-[220px] my-1 focus:shadow-outline focus:bg-black" name="exam_id" data-te-select-init data-te-select-filter="true">
                                <option value="">Attach Exam</option>
                                @foreach ($reportExams as $exam)
                                @if($exam->term->status === 1)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @include('ext._errors_exam')
                        