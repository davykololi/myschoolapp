<form action="{{ route('admin.attachDetachMeeting.dept',['id'=>$department->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_meetingdiv')
    @include('ext._submit_attach_button')
</form>