<select name="subordinates[]" class="w-full" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty('subordinates'))
  @foreach($subordinates as $subordinate)
  <option value="{{ $subordinate->id }}">{{ $subordinate->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Sub Staffs</label>
