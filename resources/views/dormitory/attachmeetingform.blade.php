<form action="{{ route('attach.meeting.dom',['id'=>$dormitory->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_meetingdiv')
    @include('ext._submit_attach_button')
</form>