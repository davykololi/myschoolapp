<form action="{{ route('detach.exam.stream',['id'=>$stream->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Detach Exam</label>
                        <div class="col-md-10">
                            <select id="exam" type="exam" value="{{old('exam')}}" class="form-control" name="exam">
                                <option value="">Select Exam</option>
                                @foreach ($streamExams as $exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('exam'))
                                <span class="help-block">
                                    <strong>{{$errors->first('exam')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Detach</button>
                            </div>
                        </div>
                </form>