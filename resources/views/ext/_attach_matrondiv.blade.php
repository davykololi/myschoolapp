                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Matron</label>
                        <div class="col-md-10">
                            <select id="matron" type="matron" value="{{old('matron')}}" class="form-control" name="matron">
                                <option value="">Select Matron</option>
                                @foreach ($matrons as $matron)
                                    <option value="{{$matron->id}}">{{$matron->full_name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('matron'))
                                <span class="help-block">
                                    <strong>{{$errors->first('matron')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>