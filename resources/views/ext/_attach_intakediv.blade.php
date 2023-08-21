                            <select id="intake" type="text" value="{{old('intake')}}" class="leading-tight" name="intake">
                                <option value="">Select Intake</option>
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