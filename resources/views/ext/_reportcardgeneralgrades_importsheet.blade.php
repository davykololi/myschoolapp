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
                        @include('ext._get_term_id')
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
                        <label>GRADE SHEET FILE:<span class="text-[red]">*</span></label>
                        <input type="file" name="file" 
                            class="w-full text-black text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />
                    </div>
                </div>
            </div>