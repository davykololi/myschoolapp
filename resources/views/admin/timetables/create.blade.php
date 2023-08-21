<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE TIMETABLE</h5> 
                <a href="{{ route('admin.timetables.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.timetables.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" placeholder="Upload Timetable">
                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Timetable description">
                            @error('desc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    @include('ext._get_streams_ids')
                    @include('ext._attach_classdiv')
                    @include('ext._get_exams_ids')
                    @include('ext._get_teachers_ids')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
