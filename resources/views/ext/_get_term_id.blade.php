                            <select id="term" type="term" value="{{old('term')}}" class="multi-dropdown" name="term" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Term">
                                @foreach ($terms as $term)
                                @if($term->status === 1)
                                    <option class="font-bold" value="{{$term->id}}">{{$term->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('term')
                            <span class="text-sm text-red-700 italic">{{ $message }}</span>
                            @enderror
                        