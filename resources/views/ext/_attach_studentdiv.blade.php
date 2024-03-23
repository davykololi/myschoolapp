<select name="students[]" class="w-full" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty('students'))
  @foreach($students as $student)
  <option value="{{ $student->id }}">{{ $student->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Students</label>
