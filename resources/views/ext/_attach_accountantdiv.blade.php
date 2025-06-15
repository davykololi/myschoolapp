                    
                            <select id="accountant_id" type="text" value="{{old('accountant_id')}}" class="form-control" name="accountant_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Accountant">
                                @foreach ($accountants as $accountant)
                                    <option value="{{$accountant->id}}">{{$accountant->full_name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('accountant_id'))
                                <span class="help-block">
                                    <strong>{{$errors->first('accountant_id')}}</strong>
                                </span>
                            @endif