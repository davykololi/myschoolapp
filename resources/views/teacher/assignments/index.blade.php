@extends('layouts.teacher')
@section('title', '| Teacher Assignments')

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            <div class="w-full mt-4">
                <div class="px-2">
                    <div class="items-center justify-center">
                        <h2 class="text-center uppercase text-2xl font-2xl font-bold">ALL MY ASSIGNMENTS</h2>
                    </div>
                    <div class="text-right">
                        <a type="button" class="bg-blue-500 px-4 py-1 rounded-md shadow-lg text-white" href="{{route('teacher.assignments.create')}}">
                            Create
                        </a>
                    </div>
                    @include('partials.messages')
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12 mb-6">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="25%">ASSIGNMENT</th>
                                        <th scope="col" class="px-2 py-4" width="15%">TO</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PUBLISHED</th>
                                        <th scope="col" class="px-2 py-4" width="15%">DEADLINE</th>
                                        <th scope="col" class="px-2 py-4" width="15%">FILE</th>
                                        <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($assignments->isNotEmpty())
                                    @foreach($assignments as $assignment)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$loop->iteration}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$assignment->name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                @if($assignment->streams->isNotEmpty())
                                                @foreach($assignment->streams as $stream)
                                                    {{$stream->name}}
                                                @endforeach
                                                @elseif($assignment->students->isNotEmpty())
                                                @foreach($assignment->students as $student)
                                                    {{$student->user->full_name}}
                                                @endforeach
                                                @elseif($assignment->staffs->isNotEmpty())
                                                @foreach($assignment->staffs as $staff)
                                                    {{$staff->user->full_name}}
                                                @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $assignment->getDate() }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $assignment->getDeadline() }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                <a type="button" href="{{route('teacher.assignment.download',$assignment->id)}}" class="bg-orange-500 inline-flex px-2 py-1 mb-0.5 justify-center items-center rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-flex pb-0.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('teacher.assignments.destroy',$assignment->id)}}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('teacher.assignments.show', $assignment->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a type="button" href="{{ route('teacher.assignments.edit', $assignment->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{$assignment->name}}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form> 
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($assignments->isEmpty())
                                    <tr class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-gray-700 dark:text-slate-400">
                                        <td colspan="12">
                                            {{ __('I have notyet given out any assignment') }}
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
@endsection









