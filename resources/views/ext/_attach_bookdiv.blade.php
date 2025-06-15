
                            <select id="book_id" type="book_id" value="{{old('book_id')}}" class="form-control" name="book_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Book">
                                @foreach ($books as $book)
                                    <option value="{{$book->id}}">{{$book->title}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('book_id'))
                                <span class="help-block">
                                    <strong>{{$errors->first('book_id')}}</strong>
                                </span>
                            @endif