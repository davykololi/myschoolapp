                    <select id="payment_section" type="payment_section" value="{{old('payment_section')}}" class="select-form-one" name="payment_section" data-te-select-init data-te-select-filter="true" data-te-select-size="sm" data-te-select-placeholder="Select Section">
                        @foreach ($paymentSections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>

                    @if($errors->has('payment_section'))
                        <span class="help-block">
                            <span class="text-danger">{{$errors->first('payment_section')}}</span>
                        </span>
                    @endif