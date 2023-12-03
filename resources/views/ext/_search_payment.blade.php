                <select id="payment" type="text" value="{{old('payment')}}" class="w-[220px]" name="payment" data-te-select-init data-te-select-filter="true">
                    @foreach ($payments as $payment)
                        <option class="w-full md:w-[220px]" value="{{$payment->id}}">{{ $student->title }}</option>
                    @endforeach
                </select>

                @if($errors->has('payment'))
                <span class="help-block">
                    <strong>{{$errors->first('payment')}}</strong>
                </span>
                @endif