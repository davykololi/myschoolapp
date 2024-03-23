@extends('layouts.admin')
@section('title', '| Admin Teachers List')

@section('content')
@role('admin')
@can('dataOfficer')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen shadow-2xl mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            @if(!empty($teachers))
            <div class="w-full">
                <div><h1 class="uppercase text-center text-2xl font-bold underline mb-4">Teachers List</h1></div>
                <div>
                    <a style="float: right;" href="{{ route('admin.school.teachers') }}">
                        <x-generate-pdf/>
                    </a>
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
                                        <th scope="col" class="px-2 py-4" width="20%">EMAIL</th>
                                        <th scope="col" class="px-2 py-4" width="15%">ID NO.</th>
                                        <th scope="col" class="px-2 py-4" width="15%">EMP NO.</th>
                                        <th scope="col" class="px-2 py-4" width="15%">POSITION</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE NO.</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach($teachers as $key => $teacher)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$loop->iteration}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$teacher->user->salutation}} {{$teacher->user->full_name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$teacher->user->email}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$teacher->id_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$teacher->emp_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$teacher->position->value }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
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
        </div>
    @endif
    </div>
</div>
</x-backend-main>
@endcan
@endrole
@endsection
