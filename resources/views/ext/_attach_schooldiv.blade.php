                            <select id="school" type="school" value="{{old('school')}}" class="form-control" name="school">
                                <option value="">Select School</option>
                                @foreach ($schools as $school)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('school'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('school')}}</span>
                                </span>
                            @endif