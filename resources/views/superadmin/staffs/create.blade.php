<x-superadmin> 
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full">
    <div class="">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE SUB STAFF</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div>@include('partials.errors')</div>
            <div class="card-body">
                <form action="{{ route('superadmin.staffs.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    <div class="flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/3">
                            <div class="flex flex-col">
                                <label>Sub Staff Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_staff_roles')
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>More About Sub Staff: <span class="text-danger">*</span></label>
                                @include('ext._content_div')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('ext._passworddiv')
                    </div>
                    @include('ext._submit_register_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
</x-superadmin>
