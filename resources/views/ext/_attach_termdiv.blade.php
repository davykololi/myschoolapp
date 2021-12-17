                            <select id="term" type="term" value="{{old('term')}}" class="form-control" name="term">
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
                        