<select class="w-full" name="assignments[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($assignments))
  @foreach($assignments as $assignment)
  <option value="{{ $assignment->id }}">{{ $assignment->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Assignments</label>
