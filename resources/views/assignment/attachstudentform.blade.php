<form action="{{ route('attach.student.assignment',['id'=>$assignment->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_studentdiv')
    @include('ext._submit_attach_button')
</form>