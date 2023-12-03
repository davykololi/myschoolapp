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
                        @include('ext._attach_termdiv')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label class="label-two">Class: <span class="text-[red]">*</span></label>
                        @include('ext._attach_classdiv')
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <div class="flex flex-col">
                        <label class="label-two">Exam: <span class="text-[red]">*</span></label>
                        @include('ext._get_exams_ids')
                    </div>
                </div>
            </div>


            <div class="flex flex-col md:flex-row gap-2 mt-4">
                
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col">
                        <label class="label-two">Teacher: <span class="text-[red]">*</span></label>
                        @include('ext._get_teachers_ids')
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col">
                        <label class="label-two">MARK SHEET FILE:<span class="text-[red]">*</span></label>
                        <input type="file" name="file" class="relative">
                    </div>
                </div>
            </div>