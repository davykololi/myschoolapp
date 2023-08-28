<x-admin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($teachers))
        <div class="w-full mb-8">
            <div class="col-lg-12 margin-tb">
                <h1 class="uppercase text-center text-2xl font-bold underline mb-4">Teachers List</h1>
                <div class="items-center justify-center">
                    <a style="float: right;" href="{{route('admin.school.teachers', Auth::user()->school->id)}}" class="pdf">
                        <x-pdf-svg/>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="20%">EMAIL</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ID NO.</th>
                                    <th scope="col" class="px-2 py-4" width="15%">EMP NO.</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ROLE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PHONE NO.</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($teachers as $key => $teacher)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$teacher->salutation}} {{$teacher->full_name}}</div>
                                    </td>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$teacher->email}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$teacher->id_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$teacher->emp_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$teacher->role->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$teacher->phone_no}}</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
</x-backend-main>
</x-admin>
