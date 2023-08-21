<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
        <div class="w-full px-4">
            <div>
                <h5 class="uppercase text-2xl font-semibold text-center">CREATE ASSIGNMENT</h5>
                <div class="mt-4 mb-8 w-full text-right px-4 md:px-2">
                <a href="{{ route('admin.assignments.index') }}" type="button" class="px-6 py-0.5 bg-blue-800 text-white rounded-md border-2 border-white md:hover:bg-blue-500 brightness-125">
                    Back
                </a>
                </div>
                @include('partials.errors')
                @include('partials.messages')
            </div>
            <div class="p-4 border-2 border border-white my-4 shadow-2xl">
                <form action="{{ route('admin.assignments.store') }}" method="POST" class="p-2" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                <h4 class="text-left font-bold uppercase">CREATE ASSIGNMENT</h4>
                <div class="w-full flex flex-col md:flex-row">
                    <div class="py-2 w-full md:w-1/3">
                        <label class="text-green-800" >Assignment Name <span class="text-[red]">***</span></label>
                        <div class="w-full">
                            <input type="text" name="name" id="name" class="py-1 bg-gray-200 w-full md:w-[220px] focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" placeholder="Assignment Name">
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/3">
                        <label class="text-green-800" >Date Given<span class="text-[red]">***</span></label>
                        <div class="w-full">
                            <input type="date" name="date_given" id="date_given" class="py-1 bg-gray-200 w-full md:w-[220px] focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" placeholder="Assignment Date">
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/3">
                        <label class="text-green-800" >Deadline<span class="text-[red]">***</span></label>
                        <div class="w-full">
                            <input type="date" name="deadline" id="deadline" class="py-1 bg-gray-200 w-full md:w-[220px] focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" placeholder="Assignment Deadline">
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row">
                    <div class="py-2 w-full md:w-1/3 lg:w-1/3">
                        <label class="text-blue-700" >Upload File<span class="text-[red]">***</span></label>
                        <div class="w-full">
                            <input type="file" name="file" id="file" class="py-1 bg-gray-200 w-full md:w-[250px] pl-2 focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" placeholder="File" required>
                        </div>
                    </div>
                </div>

                <div class="w-full flex flex-col md:flex-row md:gap-2">
                    <div class="py-2 w-full md:w-1/2 border border-white px-2 mt-4">
                        <h4 class="text-left font-bold uppercase w-full md:w-1/2">From</h4>
                        <div class="w-full">
                            @include('ext._get_teachers_ids')
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/2 border border-white px-2 mt-4">
                        <h4 class="text-left font-bold uppercase w-full">
                            To 
                            <span class="italic capitalize">(Choose where necessary)</span>
                        </h4>
                        <div class="w-full md:border-green-800 md:p-4">
                            <div class="flex flex-col">
                                <label class="uppercase" for="stream">{{ __('Select Stream') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_streamdiv')
                            </div>
                            <div class="flex flex-col mt-4">
                                <label class="uppercase" for="student">{{ __('Select Student') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_studentdiv')
                            </div>
                            <div class="flex flex-col mt-4">
                                <label class="uppercase" for="staff">{{ __('Select Staff') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_staffdiv')
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row">
                    <div class="py-2 w-full md:w-1/3">
                        <div class="w-[70px]">
                            @include('ext._submit_create_button')
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>            
  </x-backend-main>
</x-admin>






