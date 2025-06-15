<select class="w-full" name="admins_phone_numbers[]" data-te-select-init multiple data-te-select-size="sm" data-te-select-filter="true">
  @if(!empty($admins))
  @foreach($admins as $admin)
  <option value="{{ $admin->phone_no }}">{{ $admin->user->salutation }} {{ $admin->user->full_name }}</option>
  @endforeach
  @endif
</select>
<label data-te-select-label-ref>Select Administrators</label>
