    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Category</label>
        <div class="col-md-10">
            <select id="exam_category" type="exam_category" value="{{old('exam_category')}}" class="form-control" name="exam_category">
                <option value="">Select Category</option>
                @foreach ($examCategories as $key => $examCategory)
                <option value="{{$examCategory->id}}">{{$examCategory->name}}</option>
                @endforeach
            </select>

            @if($errors->has('exam_category'))
            <span class="help-block">
                <strong>{{$errors->first('exam_category')}}</strong>
            </span>
            @endif
        </div>
    </div>