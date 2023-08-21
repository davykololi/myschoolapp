<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE A MEETING</h5>
                <a href="{{ route('admin.meetings.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.meetings.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Meeting Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="date" class="form-control" placeholder="Meeting Date">
                            @error('date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Venue</label>
                        <div class="col-sm-10">
                            <input type="text" name="venue" id="venue" class="form-control" placeholder="Meeting Venue">
                            @error('venue')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Agenda</label>
                        <div class="col-sm-10">
                            <input type="text" name="agenda" id="agenda" class="form-control" placeholder="Meeting Agenda">
                            @error('agenda')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="teachers">{{__('Attach Teachers')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_teacherdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="students">{{__('Attach Students')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_studentdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="staffs">{{ __('Attach Staffs') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_staffdiv')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="streams">{{__('Attach Streams')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_streamdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="clubs">{{__('Attach Clubs')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_clubdiv')
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
