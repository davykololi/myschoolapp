<select name="subjects[]" class="w-full" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty('subjects'))
  @foreach($subjects as $subject)
  <option value="{{ $subject->id }}">{{ $subject->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Subjects</label>
