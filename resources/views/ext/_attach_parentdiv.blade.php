            <select id="parent" type="parent" value="{{old('parent')}}" class="form-control" name="parent">
                <option value="">Select Parent</option>
                @foreach ($parents as $parent)
                <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>

            @if($errors->has('parent'))
            <span class="help-block">
                <span class="text-danger">{{$errors->first('parent')}}</span>
            </span>
            @endif