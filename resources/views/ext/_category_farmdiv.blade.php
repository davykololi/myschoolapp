            <select id="type" type="text" value="{{old('type')}}" class="leading-tight" name="type" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Category">
                <option value="{{__('Students Projects Farm')}}">{{__('Students Projects Farm')}}</option>
                <option value="{{__('School Projects Farm')}}">{{__('School Projects Farm')}}</option>
                <option value="{{__('School Agricultural Farm')}}">{{__('School Agricultural Farm')}}</option>
            </select>
            @if($errors->has('type'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('type')}}</strong>
            </span>
            @endif