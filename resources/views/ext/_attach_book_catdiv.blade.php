    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Category</label>
        <div class="col-md-10">
            <select id="book_category" type="book_category" value="{{old('book_category')}}" class="form-control" name="book_category">
                <option value="">Select Category</option>
                @foreach ($bookCategories as $bookCategory)
                <option value="{{$bookCategory->id}}">{{$bookCategory->name}}</option>
                @endforeach
            </select>

            @if($errors->has('book_category'))
            <span class="help-block">
                <strong>{{$errors->first('book_category')}}</strong>
            </span>
            @endif
        </div>
    </div>