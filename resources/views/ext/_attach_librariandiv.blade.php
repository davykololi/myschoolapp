    
            <select id="lib_head" type="lib_head" value="{{old('lib_head')}}" class="form-control" name="lib_head" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Librarian">
                @foreach ($librarians as $librarian)
                <option value="{{$librarian->id}}">{{$librarian->full_name}}</option>
                @endforeach
            </select>

            @if($errors->has('lib_head'))
            <span class="help-block">
                <strong>{{$errors->first('lib_head')}}</strong>
            </span>
            @endif
        