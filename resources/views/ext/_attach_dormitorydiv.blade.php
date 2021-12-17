                            <select id="dormitory" type="text" value="{{old('dormitory')}}" class="form-control" name="dormitory">
                                <option value="">Select Dormitory</option>
                                @foreach ($dormitories as $dormitory)
                            <option value="{{$dormitory->id}}">{{$dormitory->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('dormitory'))
                                <span class="help-block">
                                    <span class="text-danger">{{$errors->first('dormitory')}}</span>
                                </span>
                            @endif