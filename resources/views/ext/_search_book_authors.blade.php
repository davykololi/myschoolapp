                <select id="book_author" type="text" value="{{old('book_author')}}" class="w-[220px]" name="book_author" data-te-select-init data-te-select-filter="true">
                    <option value="">Select Author</option>
                    @foreach ($books as $book)
                        <option class="w-full md:w-[220px]" value="{{$book->author}}">{{ $book->author }}</option>
                    @endforeach
                </select>

                @if($errors->has('book'))
                <span class="help-block">
                    <strong>{{$errors->first('book')}}</strong>
                </span>
                @endif