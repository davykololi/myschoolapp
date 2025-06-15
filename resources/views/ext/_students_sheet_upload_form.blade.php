            <div class="flex flex-col md:flex-row gap-2">
                <div class="w-full md:w-1/3 lg:w-1/3">
                    <div class="flex flex-col">
                        <label class="label-two">Intake: <span class="text-[red]">*</span></label>
                        @include('ext._attach_intakediv')
                    </div>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/3">
                    <div class="flex flex-col">
                        <label class="label-two">Dormitory: <span class="text-[red]">*</span></label>
                        @include('ext._attach_dormitorydiv')
                    </div>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/3">
                    <div class="flex flex-col">
                        <label class="label-two">STUDENTS SHEET FILE:<span class="text-[red]">*</span></label>
                        <input type="file" name="file" class="form-file-upload" />
                    </div>
                </div>
            </div>