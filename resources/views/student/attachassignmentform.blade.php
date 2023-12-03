<form action="{{ route('attach.assign.student',['id'=>$student->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_assignmentdiv')
    @include('ext._submit_attach_button')
</form>