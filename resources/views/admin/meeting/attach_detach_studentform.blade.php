<form action="{{ route('admin.attachDetachStudent.meeting',['id'=>$meeting->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_studentdiv')
    @include('ext._submit_attach_button')
</form>