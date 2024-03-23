<select class="w-full" name="exams[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($exams))
  @foreach($exams as $exam)
  <option value="{{ $exam->id }}">{{ $exam->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Exams</label>

                                