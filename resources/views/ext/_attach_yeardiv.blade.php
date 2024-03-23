                      
                            <select id="year" type="year" value="{{old('year')}}" class="multi-dropdown" name="year" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Year">
                                @foreach($years as $year)
                                @if($year->year === date('Y'))
                                <option class="font-extrabold" value="{{ $year->id }}">{{ $year->year }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('year')
                            <span class="text-sm text-red-700 italic">{{ $message }}</span>
                            @enderror
                        
                        