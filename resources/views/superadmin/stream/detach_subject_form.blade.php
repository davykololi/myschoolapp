<form action="{{ route('superadmin.detachSubject.stream',['id'=>$stream->id]) }}" method="POST" class="w-full flex-grow" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_subjectdiv')
    @include('ext._submit_detach_button')                 
</form>