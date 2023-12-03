                <select id="book" type="text" value="{{old('book')}}" class="select-form-one" name="book" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Book">
                    @foreach ($books as $book)
                        <option class="w-full md:w-[220px]" value="{{$book->id}}">{{ $book->title }}</option>
                    @endforeach
                </select>

                @if($errors->has('book'))
                <span class="help-block">
                    <strong>{{$errors->first('book')}}</strong>
                </span>
                @endif