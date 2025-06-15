<select class="w-full" name="matrons_phone_numbers[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($matrons))
  @foreach($matrons as $matron)
  <option value="{{ $matron->phone_no }}">{{ $matron->user->salutation }} {{ $matron->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Matron</label>
