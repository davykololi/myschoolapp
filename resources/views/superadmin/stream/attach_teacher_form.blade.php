<form action="{{ route('superadmin.attachTeacher.stream',['id'=>$stream->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_teacherdiv')
    @include('ext._submit_attach_button')                    
</form>