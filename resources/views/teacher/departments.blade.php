@extends('layouts.teacher')
@section('title', '| Teacher School Departments')

@section('content')
@role('teacher')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            <div class="max-w-full mb-8">
                <div class="w-full md:w-full ">
                    <div class="text-center">
                        <h2 class="uppercase text-2xl font-bold underline">DEPARMENTS LIST</h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-16 mb-6">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
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
                                    @if($departments->isNotEmpty())
                                    @foreach($departments as $key => $department)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
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
                                            <div>{{ $department->subordinates->count() }}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($departments->isEmpty())
                                    <tr class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400">
                                        <td>
                                            <div><p style="color: red">{{$user->school->name}} has no department(s) yet.</p></div>
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection


