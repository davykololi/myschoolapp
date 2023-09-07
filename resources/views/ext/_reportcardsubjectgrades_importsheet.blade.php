            <div class="flex flex-col md:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col">
                        <label>Year: <span class="text-[red]">*</span></label>
                        @include('ext._attach_yeardiv')
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col">
                        <label>Term: <span class="text-[red]">*</span></label>
                        @include('ext._attach_termdiv')
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col">
                        <label>Class: <span class="text-[red]">*</span></label>
                        @include('ext._attach_classdiv')
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-2 mt-4">
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col">
                        <label>Teacher: <span class="text-[red]">*</span></label>
                        @include('ext._get_teachers_ids')
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col">
                        <label>GRADE SHEET FILE:<span class="text-[red]">*</span></label>
                        <input type="file" name="file">
                    </div>
                </div>
            </div>