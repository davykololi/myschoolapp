<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
@can('studentRegistrar')
<div class="max-w-full">
    <div class="w-full">
        @include('partials.errors')
        <div>
            <h5 class="text-center font-bold underline text-2xl">EDIT STUDENT DETAILS</h5>
            <div class="items-center justify-center mt-4">
                <a href="{{ route('admin.students.index') }}" style="float:right;" class="bg-blue-600 px-2 py-1 rounded text-white mr-4 mt-2">
                    Back
                </a>
            </div>
            <div class="w-full pt-8 px-2 md:px-4 pb-4 shadow-2xl">
                <form action="{{ route('admin.students.update', $student->id) }}" method="post" class="mt-8" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    @include('ext._student_edit_form')
                    <div>
                        <select id="active" type="active" value="{{old('active')}}" class="form-control" name="active">
                            <option value="1">{{__('Active')}}</option>
                            <option value="0">{{__('Inactive')}}</option>
                        </select>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
</x-backend-main>
</x-admin>
