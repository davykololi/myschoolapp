                            <select id="book_genre_id" type="text" value="{{old('book_genre_id')}}" class="form-control" name="book_genre_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Library">
                                @foreach ($bookGenres as $bookGenre)
                            <option value="{{$bookGenre->id}}">{{$bookGenre->name}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('book_genre_id'))
                                <span class="help-block">
                                    <strong>{{$errors->first('book_genre_id')}}</strong>
                                </span>
                            @endif