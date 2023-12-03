<form action="{{ route('attach.lesson.stream',['id'=>$stream->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_lessondiv')
    @include('ext._submit_attach_button')
</form>