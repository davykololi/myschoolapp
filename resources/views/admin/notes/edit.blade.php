<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT NOTES</h5> 
                <a href="{{ route('admin.notes.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.notes.update', $note->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File:</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" value="{{ $note->file }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description:</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" value="{{ $note->desc }}">
                        </div>
                    </div>
                    @include('ext._get_departments_ids')
                    @include('ext._get_streams_ids')
                    @include('ext._get_teachers_ids')
                    @include('ext._get_stream_subjects_ids')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
