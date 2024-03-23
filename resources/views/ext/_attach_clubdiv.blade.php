<select name="clubs[]" class="w-full" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty('clubs'))
  @foreach($clubs as $club)
  <option value="{{ $club->id }}">{{ $club->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Clubs</label>
