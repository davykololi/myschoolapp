                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Term</label>
                        <div class="col-md-10">
                            <select id="term" type="term" value="{{old('term')}}" class="form-control" name="term" required>
                                <option value="">Select Term</option>
                                @foreach ($terms as $term)
                                    <option value="{{$term->id}}">{{$term->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('term'))
                            <span class="help-block">
                                <strong>{{$errors->first('term')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>