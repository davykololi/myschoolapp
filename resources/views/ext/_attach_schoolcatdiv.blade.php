    <div class="form-group">
        <label class="control-label col-sm-2" >School Category</label>
        <div class="col-md-10">
            <select id="school_type" type="school_type" value="{{old('school_type')}}" class="form-control" name="school_type">
                <option value="">Select Category</option>
                <option value="{{ __('National School') }}">{{ __('National School') }}</option>
                <option value="{{ __('County School') }}">{{ __('County School') }}</option>
                <option value="{{ __('Extra County School') }}">{{ __('Extra County School') }}</option>
                <option value="{{ __('Private School') }}">{{ __('Private School') }}</option>
            </select>

            @if($errors->has('school_type'))
            <span class="help-block">
                <strong>{{$errors->first('school_type')}}</strong>
            </span>
            @endif
        </div>
    </div>