            <div class="flex flex-col md:flex-row gap-2">
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label class="label-two">Year: <span class="text-[red]">*</span></label>
                        @include('ext._attach_yeardiv')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label class="label-two">Term: <span class="text-[red]">*</span></label>
                        @include('ext._get_term_id')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label class="label-two">Stream: <span class="text-[red]">*</span></label>
                        @include('ext._get_streams_ids')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label class="label-two">Exam: <span class="text-[red]">*</span></label>
                        @include('ext._get_exams_ids')
                    </div>
                </div>
            </div>