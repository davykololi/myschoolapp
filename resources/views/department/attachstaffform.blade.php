<form action="{{ route('attach.staff.dept',['id'=>$department->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_staffdiv')
    @include('ext._submit_attach_button')
</form>