<form action="{{ route('superadmin.attachDetachTeacher.dept',['id'=>$department->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
	@include('ext._csrfdiv')
    @include('ext._attach_teacherdiv')
    @include('ext._submit_attach_button')
</form>