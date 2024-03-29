<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
<div class="max-w-full container">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($departments))
        <div class="max-w-full mb-8">
            <div class="w-full md:w-full ">
                <div class="text-center">
                    <h2 class="uppercase text-2xl font-bold underline">DEPARMENTS LIST</h2>
                </div>
                <div>
                    <a type="button" href="{{route('admin.school.depts', Auth::user()->school->id)}}" class="pdf" style="float: right;">
                        <x-pdf-svg/>
                    </a>
                </div>
                <div class="w-full text-center mt-12">
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto mt-16">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PHONE NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">HEAD</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ASSISTANT</th>
                                    <th scope="col" class="px-2 py-4" width="15%">TEACHERS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">SUBSTAFF</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @foreach($departments as $key => $department)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            <a href="{{ route('admin.departments.show', $department->id) }}" class="hover:text-purple-500 hover:font-bold">
                                                {{$department->name}}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$department->phone_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$department->head_name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$department->asshead_name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->teachers->count() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->staffs->count() }}</div>
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
