                    
                            <select id="accountant" type="accountant" value="{{old('accountant')}}" class="form-control" name="accountant" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Accountant">
                                @foreach ($accountants as $accountant)
                                    <option value="{{$accountant->id}}">{{$accountant->full_name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('accountant'))
                                <span class="help-block">
                                    <strong>{{$errors->first('accountant')}}</strong>
                                </span>
                            @endif