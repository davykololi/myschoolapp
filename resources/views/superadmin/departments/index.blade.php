<x-superadmin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($departments))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="mt-4">
                    <h2 class="text-center uppercase text-2xl font-bold underline">{{Auth::user()->school->name }} Departments</h2>
                </div>
                <div  class="text-center items-center justify-center" style="float:right;">
                    <a class="bg-blue-700 text-white px-2 py-1 rounded mx-2" href="{{route('superadmin.departments.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="15%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PHONE NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">HEAD</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ASSISTANT</th>
                                    <th scope="col" class="px-2 py-4" width="10%">TEACHERS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">SUBSTAFFS</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($departments as $key => $department)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->phone_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->head_name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->asshead_name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->teachers->count() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $department->staffs->count() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.departments.destroy',$department->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('superadmin.departments.show', $department->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('superadmin.departments.edit', $department->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure to delete {{$department->name}}?')">
                                                <x-delete-svg/>
                                            </button>
                                        </form>
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
</x-superadmin>
