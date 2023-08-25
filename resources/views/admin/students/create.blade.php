<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
    @can('studentRegistrar')
    <section class=" py-1 bg-blueGray-50">
        <div class="w-full px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0 dark:bg-stone-700 dark:text-slate-200">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-800">
                            Student Registration
                        </h6>
                        <x-back-button/>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form id="ajax-reg" method="post" enctype="multipart/form-data" action="{{ route('admin.students.store') }}">
                        @csrf
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Personal Details
                        </h6>
                        @include('ext._first_common_detailsdiv')
                        <div class="flex flex-col md:flex-row lg:flex-row">
                            <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" for="student_role">Parent: </label>
                                    @include('ext._attach_parentdiv')
                                </div>
                            </div>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            School Details
                        </h6>
                        <div class="flex flex-col md:flex-row lg:flex-row">
                            <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" htmlfor="grid-password">
                                        Stream
                                    </label>
                                    @include('ext._get_streams_ids')
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" htmlfor="grid-password">
                                        Intake
                                    </label>
                                    @include('ext._attach_intakediv')
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" htmlfor="grid-password">
                                        Date Of Admission
                                    </label>
                                    <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                        <input type="text" class="form-input-one" placeholder="Select Date">
                                    </div>
                                    @error('doa')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" htmlfor="grid-password">
                                        Admission Number
                                    </label>
                                    <input type="text" class="form-input-one" placeholder="Adm Number">
                                    @error('admission_no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row lg:flex-row">
                            <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" for="student_role">
                                        Student Role: 
                                    </label>
                                    @include('ext._attach_student_role')
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" for="dorm_id">
                                        Dormitory: 
                                    </label>
                                    @include('ext._attach_dormitorydiv')
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one">Dormitory Room No:</label>
                                    <input type="text" name="dorm_room_no" placeholder="Dormitory Room No" class="form-input-one" value="{{ old('dorm_room_no') }}">
                                </div>
                            </div>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            More Information
                        </h6>
                        <div class="flex flex-col md:flex-row lg:flex-row">
                            <div class="w-full lg:w-12/12 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" htmlfor="grid-password">
                                        More Information About Student
                                    </label>
                                    @include('ext._content_div')
                                    @error('history')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Parent/Guardian Information
                        </h6>
                        @include('ext._student_create_parent_info')
                        
                        <hr class="mt-6 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Password
                        </h6>
                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            @include('ext._passworddiv')
                        </div>
                        @include('ext._submit_register_button')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endcan
</x-backend-main>
</x-admin>
