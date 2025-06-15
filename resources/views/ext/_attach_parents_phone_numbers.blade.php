<select class="w-full" name="parents_phone_numbers[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($parents))
  @foreach($parents as $parent)
  <option value="{{ $parent->phone_no }}">{{ $parent->user->salutation }} {{ $parent->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Parents</label>
