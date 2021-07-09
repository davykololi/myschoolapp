        <div class="form-group">
            <label class="control-label col-sm-2" >Attach Teacher</label>
            <div class="col-md-10">
                <select id="teacher" type="teacher" value="{{old('teacher')}}" class="form-control" name="teacher">
                    <option value="">Select Teacher</option>
                    @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->full_name}}</option>
                    @endforeach
                </select>

                @if($errors->has('teacher'))
                <span class="help-block">
                    <strong>{{$errors->first('teacher')}}</strong>
                </span>
                @endif
            </div>
        </div>