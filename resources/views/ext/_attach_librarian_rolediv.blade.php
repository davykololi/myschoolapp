            <select id="librarian_role" type="librarian_role" value="{{old('librarian_role')}}" class="form-control" name="librarian_role">
                <option value="">Select Role</option>
                @foreach ($librarianRoles as $librarianRole)
                    <option value="{{$librarianRole->id}}">{{$librarianRole->name}}</option>
                @endforeach
            </select>

            @if($errors->has('librarian_role'))
            <span class="help-block">
                <span class="text-danger">{{$errors->first('librarian_role')}}</span>
            </span>
            @endif
