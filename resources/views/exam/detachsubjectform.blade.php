<form action="{{ route('detach.subject.exam',['id'=>$exam->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Detach Subject</label>
                        <div class="col-md-10">
                            <select id="subject" type="subject" value="{{old('subject')}}" class="form-control" name="subject">
                                <option value="">Select Subject</option>
                                @foreach ($examSubjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('subject'))
                                <span class="help-block">
                                    <strong>{{$errors->first('subject')}}</strong>
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