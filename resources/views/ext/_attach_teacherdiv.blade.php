<select class="w-full" name="teachers[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($teachers))
  @foreach($teachers as $teacher)
  <option value="{{ $teacher->id }}">{{ $teacher->user->salutation }} {{ $teacher->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Teachers</label>
