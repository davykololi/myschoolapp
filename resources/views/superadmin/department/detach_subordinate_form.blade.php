<form action="{{ route('superadmin.detachSubordinate.dept',['id'=>$department->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_subordinatediv')
    @include('ext._submit_detach_button')
</form>