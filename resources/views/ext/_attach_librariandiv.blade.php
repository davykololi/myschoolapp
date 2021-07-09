    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Librarian</label>
        <div class="col-md-10">
            <select id="lib_head" type="lib_head" value="{{old('lib_head')}}" class="form-control" name="lib_head">
                <option value="">Select Librarian</option>
                @foreach ($librarians as $librarian)
                <option value="{{$librarian->id}}">{{$librarian->full_name}}</option>
                @endforeach
            </select>

            @if($errors->has('lib_head'))
            <span class="help-block">
                <strong>{{$errors->first('lib_head')}}</strong>
            </span>
            @endif
        </div>
    </div>