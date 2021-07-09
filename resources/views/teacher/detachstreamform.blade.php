                <form action="{{ route('detach.stream.teacher',['id'=>$teacher->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Detach Class</label>
                        <div class="col-md-10">
                            <select id="stream" type="stream" value="{{old('stream')}}" class="form-control" name="stream">
                                <option value="">Select Class</option>
                                @foreach ($teacherStreams as $stream)
                            <option value="{{$stream->id}}">{{$stream->name}}</option>
                                @endforeach
                            </select>
                            @include('ext._errors_stream')
                        </div>
                    </div>
                    @include('ext._submit_detach_button')
                </form>