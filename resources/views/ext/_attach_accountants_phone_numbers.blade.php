<select class="w-full" name="accountants_phone_numbers[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($accountants))
  @foreach($accountants as $accountant)
  <option value="{{ $accountant->phone_no }}">{{ $accountant->user->salutation }} {{ $accountant->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Accountants</label>
