            <div class="flex flex-col md:flex-row gap-2">
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label>Year: <span class="text-[red]">*</span></label>
                        @include('ext._attach_yeardiv')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label>Term: <span class="text-[red]">*</span></label>
                        @include('ext._attach_termdiv')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label>Class: <span class="text-[red]">*</span></label>
                        @include('ext._attach_classdiv')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label>Exam: <span class="text-[red]">*</span></label>
                        @include('ext._get_exams_ids')
                    </div>
                </div>
            </div>