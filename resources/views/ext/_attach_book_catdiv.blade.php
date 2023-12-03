            <select id="book_category" type="book_category" value="{{old('book_category')}}" class="form-control" name="book_category" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Book Category">
                @foreach ($bookCategories as $bookCategory)
                <option value="{{$bookCategory->id}}">{{$bookCategory->name}}</option>
                @endforeach
            </select>

            @if($errors->has('book_category'))
            <span class="help-block">
                <strong>{{$errors->first('book_category')}}</strong>
            </span>
            @endif
        