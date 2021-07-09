                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attach Book</label>
                        <div class="col-md-10">
                            <select id="book" type="book" value="{{old('book')}}" class="form-control" name="book">
                                <option value="">Select Book</option>
                                @foreach ($books as $book)
                                    <option value="{{$book->id}}">{{$book->title}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('book'))
                                <span class="help-block">
                                    <strong>{{$errors->first('book')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>