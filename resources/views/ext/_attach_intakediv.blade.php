                            <select id="intake_id" type="text" value="{{old('intake_id')}}" class="input-three" name="intake_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Intake">
                                @foreach ($intakes as $intake)
                                    <option value="{{$intake->id}}">
                                        {{$intake->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('intake_id'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('intake_id')}}</span>
                                </span>
                            @endif