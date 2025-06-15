            <select id="category_book_id" type="text" value="{{old('category_book_id')}}" class="form-control" name="category_book_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Book Category">
                @foreach ($bookCategories as $bookCategory)
                <option value="{{$bookCategory->id}}">{{$bookCategory->name}}</option>
                @endforeach
            </select>

            @if($errors->has('category_book_id'))
            <span class="help-block">
                <strong>{{$errors->first('category_book_id')}}</strong>
            </span>
            @endif
        