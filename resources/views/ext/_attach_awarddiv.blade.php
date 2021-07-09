    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Award</label>
        <div class="col-md-10">
            <select id="reward" type="reward" value="{{old('reward')}}" class="form-control" name="reward">
                <option value="">Select Award</option>
                @foreach ($rewards as $reward)
                <option value="{{$reward->id}}">{{$reward->name}}</option>
                @endforeach
            </select>
            @include('ext._errors_reward')
        </div>
    </div>