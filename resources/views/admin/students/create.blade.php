<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
    @can('studentRegistrar')
        <div class="card">
            <div>
                <h1 class="uppercase text-center text-2xl font-bold">STUDENT ADMISSION FORM</h1>
            </div>
            <div class="items-center justify-center">
                <a href="{{ route('admin.students.index') }}" class="mb-4 bg-blue-500 px-2 py-1 rounded text-white md:hover:bg-white md:hover:text-blue-500 md:hover:border border-blue-500 md:hover:bg-brightness-150" style="float: right;">
                    Back
                </a>
            </div>
            <div class="mt-12">
            <form id="ajax-reg" method="post" enctype="multipart/form-data" class="border-4 border-white p-2 md:p-4" action="{{ route('admin.students.store') }}" data-fouc>
               @csrf
                <fieldset class="border border-black p-4 shadow-2xl dark:border-slate-400">
                    <h2 class="text-center text-2xl font-bold underline">PERSONAL DETAILS</h2>
                    @include('ext._first_common_detailsdiv')

                    <div class="w-full md:w-1/3 lg:w-1/3 mt-4">
                        <div class="flex flex-col">
                            <label for="student_role">Parent: </label>
                            @include('ext._attach_parentdiv')
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border border-black p-4 shadow-2xl mt-4 dark:border-slate-400">
                    <h2 class="text-center text-2xl font-bold underline">SCHOOL SPECIFIC DETAILS</h2>
                    <div class="max-w-full py-2 flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label for="stream">Class: <span class="text-danger">*</span></label>
                                @include('ext._get_streams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label for="section_id">Intake: <span class="text-danger">*</span></label>
                                @include('ext._attach_intakediv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label for="year_admitted">Admission Date: <span class="text-danger">*</span></label>
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="doa" value="{{ old('doa')}}" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date"/>
                                </div>
                                @error('doa')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label>Admission Number:</label>
                                <input type="text" name="admission_no" placeholder="Admission Number" class="leading-tight" value="{{ old('admission_no') }}">
                                @error('admission_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="max-w-full py-2 flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label for="student_role">Student Role: </label>
                                @include('ext._attach_student_role')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label for="dorm_id">Dormitory: </label>
                                @include('ext._attach_dormitorydiv')
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Dormitory Room No:</label>
                                <input type="text" name="dorm_room_no" placeholder="Dormitory Room No" class="leading-tight" value="{{ old('dorm_room_no') }}">
                            </div>
                        </div>
                    </div>
                    <div class="max-w-full py-2 flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full">
                            <div class="flex flex-col">
                                <label>More Information:</label>
                                @include('ext._content_div')
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="border border-black p-4 shadow-2xl mt-4 dark:border-slate-400">
                    @include('ext._student_create_parent_info')
                </fieldset>
                <fieldset class="border border-black p-4 shadow-2xl mt-4 dark:border-slate-400">
                    <h3 class="text-center font-bold text-2xl underline uppercase">Set Password</h3>
                    <div class="max-w-full py-2 flex flex-col md:flex-row lg:flex-row gap-2">
                        @include('ext._passworddiv')
                    </div>
                    @include('ext._submit_register_button')
                </fieldset>
            </form>
            </div>
        </div>
        @endcan
    </x-backend-main>
</x-admin>
