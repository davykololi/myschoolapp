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
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/2 lg:w-1/2 mb-2">
                            <label class="" >File</label>
                            <div class="w-full block">
                                <input type="file" name="file" id="file" class="form-control" placeholder="Upload Timetable">
                                @error('file')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2 mb-2">
                            <label class="" >Description</label>
                            <div class="w-full block">
                                <input type="text" name="desc" id="desc" class="form-control" placeholder="Timetable description">
                                @error('desc')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Stream</label>
                            <div class="w-full block">
                                @include('ext._get_streams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Class</label>
                            <div class="w-full block">
                                @include('ext._attach_classdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Exam</label>
                            <div class="w-full block">
                                @include('ext._get_exams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Teacher</label>
                            <div class="w-full block">
                                @include('ext._get_teachers_ids')
                            </div>
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
