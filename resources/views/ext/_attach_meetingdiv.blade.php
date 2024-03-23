<select class="w-full" name="meetings[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($meetings))
  @foreach($meetings as $meeting)
  <option value="{{ $meeting->id }}">{{ $meeting->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Meetings</label>
