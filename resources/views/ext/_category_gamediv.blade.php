                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="game_category" type="game_category" value="{{old('game_category')}}" class="form-control" name="game_category">
                                <option value="">Select Category</option>
                                @foreach ($categoryGames as $key => $categoryGame)
                                    <option value="{{$categoryGame->id}}">{{$categoryGame->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('game_category'))
                                <span class="help-block">
                                    <strong>{{$errors->first('game_category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


            <select id="type" type="text" value="{{old('type')}}" class="leading-tight" name="type" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Category">
                <option value="{{__('Dinning Hall')}}">{{__('Dinning Hall')}}</option>
                <option value="{{__('Theatre Hall')}}">{{__('Theatre Hall')}}</option>
                <option value="{{__('Entertainment Hall')}}">{{__('Entertainment Hall')}}</option>
            </select>
            @if($errors->has('type'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('type')}}</strong>
            </span>
            @endif