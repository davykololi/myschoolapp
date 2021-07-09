                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Accountant</label>
                        <div class="col-md-10">
                            <select id="accountant" type="accountant" value="{{old('accountant')}}" class="form-control" name="accountant">
                                <option value="">Select Accountant</option>
                                @foreach ($accountants as $accountant)
                                    <option value="{{$accountant->id}}">{{$accountant->full_name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('accountant'))
                                <span class="help-block">
                                    <strong>{{$errors->first('accountant')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>