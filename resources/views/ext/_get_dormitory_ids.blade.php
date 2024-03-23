                    <select id="dormitory" type="dormitory" value="{{old('dormitory')}}" class="select-form-one" name="dormitory" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Dormitory">
                        @foreach ($dormitories as $dormitory)
                        <option value="{{ $dormitory->id }}">{{ $dormitory->name }}</option>
                        @endforeach
                    </select>

                    @if($errors->has('dormitory'))
                        <span class="help-block">
                            <span class="text-danger">{{$errors->first('dormitory')}}</span>
                        </span>
                    @endif