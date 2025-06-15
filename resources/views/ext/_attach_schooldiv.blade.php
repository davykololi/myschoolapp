                            <select id="school_id" type="school_id" value="{{old('school_id')}}" class="form-control" name="school_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select School">
                                @foreach ($schools as $school)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('school_id'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('school_id')}}</span>
                                </span>
                            @endif