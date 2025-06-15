                <select id="book_id" type="text" value="{{old('book_id')}}" class="select-form-one" name="book_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Book">
                    @foreach ($books as $book)
                        <option class="w-full md:w-[220px]" value="{{$book->id}}">{{ $book->title }}</option>
                    @endforeach
                </select>

                @if($errors->has('book_id'))
                <span class="help-block">
                    <strong>{{$errors->first('book_id')}}</strong>
                </span>
                @endif