                <select id="teacher_id" type="text" value="{{old('teacher_id')}}" class="w-full bg-transparent" name="teacher_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Teacher">
                    @foreach ($teachers as $teacher)
                        <option value="{{$teacher->id}}" data-te-select-icon="{{ $teacher->image_url }}">
                            {{$teacher->user->salutation}} {{$teacher->user->full_name}}
                        </option>
                    @endforeach
                </select>

                @if($errors->has('teacher_id'))
                <span class="help-block">
                    <strong>{{$errors->first('teacher_id')}}</strong>
                </span>
                @endif