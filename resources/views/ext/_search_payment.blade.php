                <select id="payment_id" type="text" value="{{old('payment_id')}}" class="w-[220px]" name="payment_id" data-te-select-init data-te-select-filter="true">
                    @foreach ($payments as $payment)
                        <option class="w-full md:w-[220px]" value="{{$payment->id}}">{{ $student->title }}</option>
                    @endforeach
                </select>

                @if($errors->has('payment_id'))
                <span class="help-block">
                    <strong>{{$errors->first('payment_id')}}</strong>
                </span>
                @endif