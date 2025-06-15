<form action="{{ route('superadmin.detachTeacher.stream',['id'=>$stream->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_teacherdiv')
    @include('ext._submit_detach_button')                    
</form>