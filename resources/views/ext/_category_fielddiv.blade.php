            <select id="type" type="text" value="{{old('type')}}" class="leading-tight" name="type" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Category">
                <option value="{{__('East End Field')}}">{{__('East End Field')}}</option>
                <option value="{{__('West End Field')}}">{{__('West End Field')}}</option>
                <option value="{{__('South End Field')}}">{{__('South End Field')}}</option>
            </select>
            @if($errors->has('type'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('type')}}</strong>
            </span>
            @endif