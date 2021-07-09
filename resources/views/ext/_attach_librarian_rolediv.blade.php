    <div class="form-group">
        <label class="control-label col-sm-2" >Attach Role</label>
        <div class="col-md-10">
            <select id="librarian_role" type="librarian_role" value="{{old('librarian_role')}}" class="form-control" name="librarian_role">
                <option value="">Select Role</option>
                @foreach ($librarianRoles as $librarianRole)
                <option value="{{$librarianRole->id}}">{{$librarianRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('librarian_role'))
            <span class="help-block">
                <strong>{{$errors->first('librarian_role')}}</strong>
            </span>
            @endif
        </div>
    </div>