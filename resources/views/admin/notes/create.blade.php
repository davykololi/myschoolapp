<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE NOTES</h5> 
                <a href="{{ route('admin.notes.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="max-w-full leading-tight items-center mt-8">
                @include('partials.errors')
            </div>
            <div class="card-body">
                <form action="{{ route('admin.notes.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File:</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" placeholder="File For Upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description:</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    @include('ext._get_departments_ids')
                    @include('ext._get_streams_ids')
                    @include('ext._get_teachers_ids')
                    @include('ext._get_stream_subjects_ids')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
