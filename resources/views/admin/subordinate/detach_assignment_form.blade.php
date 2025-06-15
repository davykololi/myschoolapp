<form action="{{ route('admin.detachAssignment.subordinate',['id'=>$subordinate->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @include('ext._csrfdiv')
    @include('ext._attach_assignmentdiv')
    @include('ext._submit_detach_button')              
</form>