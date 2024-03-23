            <select id="type" type="text" value="{{old('type')}}" class="leading-tight" name="type" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Category">
                <option value="{{__('Form One Best Student In Chemistry')}}">{{__('Form One Best Student In Chemistry')}}</option>
                <option value="{{__('Form One Best Student In Mathematics')}}">{{__('Form One Best Student In Mathematics')}}</option>
                <option value="{{__('Form One Best Student In Physics')}}">{{__('Form One Best Student In Physics')}}</option>
            </select>
            @if($errors->has('type'))
            <span class="help-block">
                <strong class="text-red-700">{{$errors->first('type')}}</strong>
            </span>
            @endif