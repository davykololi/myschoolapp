<form action="{{ route('superadmin.attachSubordinate.dept',['id'=>$department->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_subordinatediv')
    @include('ext._submit_attach_button')
</form>