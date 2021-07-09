                    <div class="form-group">
                        <label class="control-label col-sm-2" >School</label>
                        <div class="col-md-10">
                            <select id="school" type="school" value="{{old('school')}}" class="form-control" name="school" required>
                                <option value="">Select School</option>
                                @foreach ($schools as $school)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('school'))
                                <span class="help-block">
                                    <strong>{{$errors->first('school')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>