<select class="w-full" name="librarians_phone_numbers[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($librarians))
  @foreach($librarians as $librarian)
  <option value="{{ $librarian->phone_no }}">{{ $librarian->user->salutation }} {{ $librarian->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Librarians</label>
