@extends('layouts.admin')
@section('title', '| Admin Departments List')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                @include('partials.messages')
                <!-- Posts list -->
                @if(!empty($departments))
                <div class="max-w-full mb-8">
                    <div class="w-full md:w-full ">
                        <div class="text-center">
                            <h2 class="uppercase text-2xl font-bold underline">DEPARMENTS LIST</h2>
                        </div>
                        <div>
                            <a type="button" href="{{route('admin.school.depts', Auth::user()->admin->school->id)}}" style="float: right;">
                                <x-generate-pdf/>
                            </a>
                        </div>
                        <div class="w-full text-center mt-12">
                            @include('partials.errors')
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col overflow-x-auto mt-12">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
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
                                        <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-800">
                                            <td class="whitespace-nowrap p-2">
                                                <div>{{$loop->iteration}}</div>
                                            </td>
                                            <td class="whitespace-nowrap p-2">
                                                <div>
                                                    <a href="{{ route('admin.departments.show', $department->id) }}" class="hover:text-purple-500 hover:font-bold">
                                                        {{$department->name}}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap p-2">
                                                <div>{{$department->phone_no}}</div>
                                            </td>
                                            <td class="whitespace-nowrap p-2">
                                                <div>{{$department->head_name}}</div>
                                            </td>
                                            <td class="whitespace-nowrap p-2">
                                                <div>{{$department->asshead_name}}</div>
                                            </td>
                                            <td class="whitespace-nowrap p-2">
                                                <div>{{ $department->teachers->count() }}</div>
                                            </td>
                                            <td class="whitespace-nowrap p-2">
                                                <div>{{ $department->subordinates->count() }}</div>
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
    </div>
</div>
</x-backend-main>
@endrole
@endsection
