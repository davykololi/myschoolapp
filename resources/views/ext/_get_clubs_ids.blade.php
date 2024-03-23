                    <select id="club" type="club" value="{{old('club')}}" class="select-form-one" name="club" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Club">
                        @foreach ($clubs as $club)
                        <option value="{{$club->id}}">{{$club->name}}</option>
                        @endforeach
                    </select>

                    @if($errors->has('club'))
                        <span class="help-block">
                            <span class="text-danger">{{$errors->first('club')}}</span>
                        </span>
                    @endif