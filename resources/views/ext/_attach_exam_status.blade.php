                        <select id="status" type="text" value="{{old('status')}}" class="w-full" name="status" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Status">
                            <option value="0">{{__('RESERVED')}}</option>
                            <option value="1">{{__('CURRENT')}}</option>
                            <option value="2">{{__('SCHEDULED')}}</option>
                        </select>
                        @error('status')
                            <span class="text-sm text-red-700 italic">{{ $message }}</span>
                        @enderror