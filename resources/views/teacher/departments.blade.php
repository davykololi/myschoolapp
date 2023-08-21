<x-teacher>
    <!-- frontend-main view -->
    <x-frontend-main>
    <div class="max-w-full">
    <div class="w-full md:w-full lg:w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($departments))
        <div class="max-w-full mb-8">
            <div class="w-full md:w-full ">
                <div class="text-center">
                    <h2 class="uppercase text-2xl font-bold underline">DEPARMENTS LIST</h2>
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
                                    <th scope="col" class="px-2 py-4" width="15%">PHONE NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">HEAD</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ASSISTANT</th>
                                    <th scope="col" class="px-2 py-4" width="10%">TEACHERS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">SUBSTAFF</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @forelse($departments as $key => $department)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <a href="{{ route('teacher.dept.show', $department->id) }}" class="hover:underline hover:text-purple-500">
                                            <div>{{$department->name}}</div>
                                        </a>
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
                                @empty
                                <tr>
                                    <td>
                                        <div><p style="color: red">{{$user->school->name}} has no department(s) yet.</p></div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
</x-frontend-main>
</x-teacher>


