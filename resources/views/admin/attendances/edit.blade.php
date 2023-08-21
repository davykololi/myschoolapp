<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT ATTENDANCE</h5> 
                <a href="{{ route('admin.attendances.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.attendances.update', $attendance->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attendance Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $attendance->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attendance Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="date" class="form-control" value="{{ $attendance->date }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attendance Time</label>
                        <div class="col-sm-10">
                            <input type="datetime" name="time" id="time" class="form-control" value="{{ $attendance->time }}">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                    	<div class="col-md-6 offset-md-4">
                        	<button type="submit" class="btn btn-primary">
                            	Update
                            </button>
                    	</div>
                 	</div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
