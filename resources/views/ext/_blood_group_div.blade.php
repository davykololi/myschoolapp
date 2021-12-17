                            <select id="blood_group" type="blood_group" value="{{old('blood_group')}}" class="form-control" name="blood_group">
                                <option value="">Select Blood Group</option>
                                @foreach ($bloodGroups as $bloodGroup)
                                    <option value="{{$bloodGroup->id}}">{{$bloodGroup->type}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('blood_group'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('blood_group')}}</span>
                                </span>
                            @endif
                                            