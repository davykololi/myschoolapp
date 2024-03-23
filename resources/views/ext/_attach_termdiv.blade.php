<select name="terms[]" class="w-full" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty('terms'))
  @foreach($terms as $term)
  <option value="{{ $term->id }}">{{ $term->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Terms</label>
