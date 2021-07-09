<form action="{{ route('detach.reward.stream',['id'=>$stream->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Reward</label>
        <div class="col-md-10">
            <select id="reward" type="reward" value="{{old('reward')}}" class="form-control" name="reward">
                <option value="">Select Reward</option>
                @foreach ($streamRewards as $reward)
                <option value="{{$reward->id}}">{{$reward->name}}</option>
                @endforeach
            </select>

            @if($errors->has('reward'))
            <span class="help-block">
                <strong>{{$errors->first('reward')}}</strong>
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