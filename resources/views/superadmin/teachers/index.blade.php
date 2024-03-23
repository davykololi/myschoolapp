@extends('layouts.superadmin')
@section('title', '| Teachers List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen page-container">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <div class="w-full">
                <div><h1 class="uppercase text-center text-2xl font-bold underline mb-4">Teachers List</h1></div>
                <div class="inline-flex">
                    <a href="{{route('superadmin.school.teachers', Auth::user()->school->id)}}">
                        <x-carbon-document-pdf class="w-16 h-10 bg-orange-500 text-white px-4 py-0.5 rounded mx-1"/>
                    </a>
                    <a href="{{route('superadmin.export.shool_teachers')}}" class="bg-green-800 text-white px-2 py-1 rounded mx-2 dark:bg-green-900 dark:text-slate-400">
                        Excel
                    </a>
                    <a class="bg-blue-700 text-white px-2 py-1 rounded mx-2 dark:text-slate-400 dark:bg-gray-800" href="{{route('superadmin.teachers.create')}}">
                        Create
                    </a>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-16">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="15%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="10%">EMAIL</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ID NO.</th>
                                        <th scope="col" class="px-2 py-4" width="10%">EMP NO.</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ROLE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE NO.</th>
                                        <th scope="col" class="px-2 py-4" width="10%">BANNED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">STATUS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($teachers))
                                    @foreach($teachers as $key => $teacher)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
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
                                        <td class="whitespace-nowrap p-2">
                                            @if($teacher->is_banned == 1)
                                            <div class="text-[red]">{{ __('YES') }}</div>
                                            @else
                                            <div class="text-[green]">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                @if($teacher->is_banned == 0)
                                                <form action="{{ route('superadmin.teacher.bann',$teacher->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-red-700 px-4 py-1 rounded">BAN</button>
                                                </form>
                                                @elseif($teacher->is_banned == 1)
                                                <form action="{{ route('superadmin.teacher.unbann',$teacher->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-green-700 px-4 py-1 rounded">
                                                        LIFT BAN
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('superadmin.teachers.destroy',$teacher->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('superadmin.teachers.show', $teacher->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a type="button" href="{{ route('superadmin.teachers.edit', $teacher->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
