                    <div class="form-group">
                        <label class="control-label col-sm-2" >Library Name</label>
                        <div class="col-md-10">
                            <select id="library" type="text" value="{{old('library')}}" class="form-control" name="library">
                                <option value="">Select Library</option>
                                @foreach ($libraries as $library)
                            <option value="{{$library->id}}">{{$library->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('library'))
                                <span class="help-block">
                                    <strong>{{$errors->first('library')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>