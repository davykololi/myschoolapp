                    
                            <select id="matron_id" type="text" value="{{old('matron_id')}}" class="form-control" name="matron_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Matron">
                                @foreach ($matrons as $matron)
                                    <option value="{{$matron->id}}">{{$matron->full_name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('matron_id'))
                                <span class="help-block">
                                    <strong>{{$errors->first('matron_id')}}</strong>
                                </span>
                            @endif
                        