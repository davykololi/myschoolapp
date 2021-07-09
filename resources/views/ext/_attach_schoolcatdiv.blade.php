    <div class="form-group">
        <label class="control-label col-sm-2" >Category</label>
        <div class="col-md-10">
            <select id="school_category" type="school_category" value="{{old('school_category')}}" class="form-control" name="school_category">
                <option value="">Select Category</option>
                @foreach ($schoolCategories as $schoolCategory)
                <option value="{{$schoolCategory->id}}">{{$schoolCategory->name}}</option>
                @endforeach
            </select>

            @if($errors->has('school_category'))
            <span class="help-block">
                <strong>{{$errors->first('school_category')}}</strong>
            </span>
            @endif
        </div>
    </div>