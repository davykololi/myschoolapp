<form action="{{ route('superadmin.detachMeeting.club',['id'=>$club->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_meetingdiv')
    @include('ext._submit_detach_button')
</form>