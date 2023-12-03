<form action="{{ route('attach.exam.stream',['id'=>$stream->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
	@include('ext._csrfdiv')
    @include('ext._attach_examdiv')
    @include('ext._submit_attach_button')            
</form>