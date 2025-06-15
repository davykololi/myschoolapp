<select class="w-full" name="subordinates_phone_numbers[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($subordinates))
  @foreach($subordinates as $subordinate)
  <option value="{{ $subordinate->phone_no }}">{{ $subordinate->user->salutation }} {{ $subordinate->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Subordinate Staffs</label>
