                    <div class="form-group">
                        <label class="control-label col-sm-2">Department</label>
                        <div class="col-md-10">
                            <select id="department" type="department" class="form-control" name="department">
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('department'))
                                <span class="help-block">
                                    <strong>{{$errors->first('department')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>