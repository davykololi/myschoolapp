<x-teacher>
    <!-- frontend-main view -->
    <x-frontend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit <a href="{{ route('teacher.assignments.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('teacher.assignments.update', $assignment->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Assignment Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $assignment->name }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date Given</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_given" id="date_given" class="form-control" value="{{$assignment->date_given}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Deadline</label>
                        <div class="col-sm-10">
                            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $assignment->deadline }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" value="{{ $assignment->file }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Select Class</label>
                        <div class="col-sm-10">
                            @include('ext._attach_streamdiv')
                        </div>
                    </div>
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_staffdiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
</x-teacher>
