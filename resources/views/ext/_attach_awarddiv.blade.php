<select class="w-full" name="rewards[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($rewards))
  @foreach($rewards as $reward)
  <option value="{{ $reward->id }}">{{ $reward->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Awards</label>
