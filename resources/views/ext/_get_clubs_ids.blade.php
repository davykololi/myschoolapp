                    <select id="club_id" type="text" value="{{old('club_id')}}" class="select-form-one" name="club_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Club">
                        @foreach ($clubs as $club)
                        <option value="{{$club->id}}">{{$club->name}}</option>
                        @endforeach
                    </select>

                    @if($errors->has('club_id'))
                        <span class="help-block">
                            <span class="text-danger">{{$errors->first('club_id')}}</span>
                        </span>
                    @endif