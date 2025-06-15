                      
                            <select id="year_id" type="text" value="{{old('year_id')}}" class="multi-dropdown" name="year_id" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Year">
                                @foreach($years as $year)
                                @if($year->year === date('Y'))
                                <option class="font-extrabold" value="{{ $year->id }}">{{ $year->year }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('year_id')
                            <span class="text-sm text-red-700 italic">{{ $message }}</span>
                            @enderror
                        
                        