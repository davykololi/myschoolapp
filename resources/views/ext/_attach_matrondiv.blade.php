                    
                            <select id="matron" type="matron" value="{{old('matron')}}" class="form-control" name="matron" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Matron">
                                @foreach ($matrons as $matron)
                                    <option value="{{$matron->id}}">{{$matron->full_name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('matron'))
                                <span class="help-block">
                                    <strong>{{$errors->first('matron')}}</strong>
                                </span>
                            @endif
                        