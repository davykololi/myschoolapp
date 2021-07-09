                <form action="{{ route('detach.subject.student',['id'=>$student->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Detach Subject</label>
                        <div class="col-md-10">
                            <select id="subject" type="subject" value="{{old('subject')}}" class="form-control" name="subject">
                                <option value="">Select Subject</option>
                                @foreach ($studentSubjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @include('ext._errors_subject')
                        </div>
                    </div>
                    @include('ext._submit_detach_button')
                </form>