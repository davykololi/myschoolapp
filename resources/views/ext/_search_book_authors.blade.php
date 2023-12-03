                <select id="book_author" type="text" value="{{old('book_author')}}" class="select-form-one" name="book_author" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Author">
                    @foreach ($books as $book)
                        <option class="w-full md:w-[220px]" value="{{$book->author}}">{{ $book->author }}</option>
                    @endforeach
                </select>

                @if($errors->has('book'))
                <span class="help-block">
                    <strong>{{$errors->first('book')}}</strong>
                </span>
                @endif