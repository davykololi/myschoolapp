
                            <select id="book" type="book" value="{{old('book')}}" class="form-control" name="book" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Book">
                                @foreach ($books as $book)
                                    <option value="{{$book->id}}">{{$book->title}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('book'))
                                <span class="help-block">
                                    <strong>{{$errors->first('book')}}</strong>
                                </span>
                            @endif