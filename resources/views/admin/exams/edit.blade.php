<x-admin> 
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full md:p-8 lg:p-8 shadow-2xl">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="text-center uppercase font-bold text-2xl underline mb-4">Edit An Exam</h5>
            </div>
            <x-back-button/>
            <div class="px-4 border-2 mt-8 py-8">
                <form action="{{ route('admin.exams.update', $exam->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Exam Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $exam->name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="w-full" >Start Date</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="start_date" id="start_date" class="w-full" value="{{ $exam->start_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >End Date</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="end_date" id="end_date" class="w-full" value="{{ $exam->end_date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="w-full" >Year</label>
                            <div class="flex flex-col">
                                @include('ext._attach_yeardiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="w-full" >Term</label>
                            <div class="flex flex-col">
                                @include('ext._attach_termdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="w-full" >Category</label>
                            <div class="flex flex-col">
                                <select id="exam_type" type="exam_type" value="{{old('exam_type')}}" class="form-control" name="exam_type">
                                    <option value="{!! $exam->type !!}" @if($exam->type) selected @endif>
                                        {!! $exam->type !!}
                                    </option>
                                    <option value="{{ __('Mid Term Examinations') }}">{{ __('Mid Term Examinations') }}</option>
                                    <option value="{{ __('End Term Examinations') }}">{{ __('End Term Examinations') }}</option>
                                    <option value="{{ __('Mock Examinations') }}">{{ __('Mock Examinations') }}</option>
                                </select>

                                @if($errors->has('exam_type'))
                                <span class="help-block">
                                    <strong>{{$errors->first('exam_type')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="w-full" >Subjects</label>
                            <div class="flex flex-col">
                                @include('ext._attach_subjectdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="w-full" >Streams</label>
                            <div class="flex flex-col">
                                @include('ext._attach_streamdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="w-full" >Status</label>
                            <div class="flex flex-col">
                                @include('ext._attach_exam_status')
                            </div>
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
</x-admin>
