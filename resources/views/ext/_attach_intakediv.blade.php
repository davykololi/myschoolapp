                            <select id="intake" type="text" value="{{old('intake')}}" class="form-input-one" name="intake" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Intake">
                                @foreach ($intakes as $intake)
                                    <option value="{{$intake->id}}">
                                        {{$intake->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('intake'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('intake')}}</span>
                                </span>
                            @endif