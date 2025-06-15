                    <select id="dormitory_id" type="type" value="{{old('dormitory_id')}}" class="select-form-one" name="dormitory_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Dormitory">
                        @foreach ($dormitories as $dormitory)
                        <option value="{{ $dormitory->id }}">{{ $dormitory->name }}</option>
                        @endforeach
                    </select>

                    @if($errors->has('dormitory_id'))
                        <span class="help-block">
                            <span class="text-danger">{{$errors->first('dormitory_id')}}</span>
                        </span>
                    @endif