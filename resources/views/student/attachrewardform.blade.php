<form action="{{ route('attach.reward.student',['id'=>$student->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_awarddiv')
    @include('ext._submit_attach_button')
</form>