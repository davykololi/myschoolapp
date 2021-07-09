<form action="{{ route('detach.teacher.club',['id'=>$club->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Detach Teacher</label>
                        <div class="col-md-10">
                            <select id="teacher" type="teacher" value="{{old('teacher')}}" class="form-control" name="teacher">
                                <option value="">Select Teacher</option>
                                @foreach ($clubTeachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->full_name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('teacher'))
                                <span class="help-block">
                                    <strong>{{$errors->first('teacher')}}</strong>
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