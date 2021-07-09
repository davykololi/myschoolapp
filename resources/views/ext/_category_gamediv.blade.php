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