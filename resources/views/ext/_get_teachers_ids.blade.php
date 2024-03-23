                <select id="teacher" type="text" value="{{old('teacher')}}" class="w-full bg-transparent" name="teacher" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Teacher">
                    @foreach ($teachers as $teacher)
                        <option value="{{$teacher->id}}" data-te-select-icon="{{ $teacher->image_url }}">
                            {{$teacher->user->salutation}} {{$teacher->user->full_name}}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('teacher'))
                <span class="help-block">
                    <strong>{{$errors->first('teacher')}}</strong>
                </span>
                @endif