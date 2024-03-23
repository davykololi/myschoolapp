<form action="{{ route('admin.attachDetachSubordinate.meeting',['id'=>$meeting->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_subordinatediv')
    @include('ext._submit_attach_button')
</form>