<select name="streams[]" class="w-full" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty('streams'))
  @foreach($streams as $stream)
  <option value="{{ $stream->id }}">{{ $stream->name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Streams</label>
