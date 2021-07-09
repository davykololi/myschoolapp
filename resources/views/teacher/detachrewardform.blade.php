<form action="{{ route('detach.reward.teacher',['id'=>$teacher->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" >Detach Reward</label>
        <div class="col-md-10">
            <select id="reward" type="reward" value="{{old('reward')}}" class="form-control" name="reward">
                <option value="">Select Reward</option>
                @foreach ($teacherRewards as $reward)
                <option value="{{$reward->id}}">{{$reward->name}}</option>
                @endforeach
            </select>
            @include('ext._errors_reward')
        </div>
    </div>
    @include('ext._submit_detach_button')
</form>