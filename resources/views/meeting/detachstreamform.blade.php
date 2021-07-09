<form action="{{ route('detach.std.meeting',['id'=>$meeting->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Stream</label>
        <div class="col-md-10">
            <select id="stream" type="stream" value="{{old('stream')}}" class="form-control" name="stream">
                <option value="">Select Class</option>
                @foreach ($meetingStreams as $stream)
                <option value="{{$stream->id}}">{{$stream->class->name}} {{$stream->name}}</option>
                @endforeach
            </select>

            @if($errors->has('stream'))
            <span class="help-block">
                <strong>{{$errors->first('stream')}}</strong>
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