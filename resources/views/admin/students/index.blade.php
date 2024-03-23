@extends('layouts.admin')
@section('title', '| Admin Students List')

@section('content')
@role('admin')
@can('studentRegistrar')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            @if(!empty($students))
            <div class="w-full">
                <div class="">
                    <div class="text-center py-4 group-hover:text-red-600">
                        <h2 class="admin-h2 font-branda">STUDENTS LIST</h2>
                        <h5>Page {{ $students->currentPage() }} of {{ $students->lastPage() }}</h5>
                    </div>
                    <div class="flex flex-row mb-4" style="float: right;">
                        @can('studentRegistrar')
                        <div class="inline-flex">
                            <a href="{{route('admin.students.create')}}">
                                <x-carbon-document-add class="w-16 h-10 bg-blue-700 text-white px-2 py-0.5 rounded mx-1"/>
                            </a>
                            <a class="excel" href="{{route('admin.export.students')}}">
                                <x-excel-svg/>
                            </a> 
                            <a href="{{ route('admin.school.students') }}" class="justify-center items-center">
                                <x-carbon-document-pdf class="w-16 h-10 bg-orange-500 text-white px-4 py-0.5 rounded mx-1"/>
                            </a>
                        </div>
                        @endcan
                    </div>
                    <div class="pt-8 uppercase text-center font-2xl">
                        @include('partials.messages')
                        @include('partials.errors')
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col overflow-x-auto md:mx-2 mt-8">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto" data-te-datatable-init>
                            <table class="group text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly shadow-3xl">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4 group-hover:text-red-600" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-orange-600" width="10%">AVATAR</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-yellow-400" width="20%">NAME</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-purple-600" width="10%">ADM NO</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-blue-600" width="10%">CLASS</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-green-600" width="10%">PHONE</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-sky-600" width="10%">EMAIL</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-red-600" width="10%">ROLE</th>
                                        <th scope="col" class="px-2 py-4 group-hover:text-red-600" width="15%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach($students as $student)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2 relative">
                                            <div>@include('partials.student-avatar')</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->user->salutation }} {{ $student->user->full_name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->admission_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->stream->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->phone_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->user->email }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                {{ $student->position->value }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2 flex flex-row inline-flex">
                                            <form action="{{route('admin.students.destroy',$student->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('admin.students.show', $student->id) }}">
                                                    <x-carbon-show-data-cards class="w-8 h-8 bg-blue-700 text-white p-1 rounded mx-1"/>
                                                </a>
                                                @can('studentRegistrar')
                                                <a type="button" href="{{ route('admin.students.edit', $student->id) }}">
                                                    <x-carbon-edit class="w-8 h-8 bg-yellow-500 text-white p-1 rounded mx-1"/>
                                                </a>
                                                @endcan
                                                @can('studentRegistrar')
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')" {{ $student->lock }}>
                                                    <x-carbon-trash-can class="w-8 h-8 bg-red-700 text-white p-1 rounded mx-1"/>
                                                </button>
                                                @endcan
                                            </form>
                                            <form action="{{ route('admin.student.details') }}" method="GET">
                                                @csrf
                                                <input type="hidden" name="student" value="{{ $student->id}}">
                                                <button type="submit">
                                                    <x-carbon-document-pdf class="w-8 h-8 bg-orange-500 text-white p-1 rounded mx-1"/>
                                                </button>     
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <div class="relative my-4 text-white dark:text-slate-200">
                                        {{ $students->links() }}
                                    </div>
                                </tfoot>
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
