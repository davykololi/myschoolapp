<form action="{{ route('attach.subject.student',['id'=>$student->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_subjectdiv')
    @include('ext._submit_attach_button')                 
</form>