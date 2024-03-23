@extends('layouts.admin')
@section('title', '| Admin Assignments List')

@section('content')
@role('admin')
@can('academicRegistrar')
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    @include('partials.messages')
    <!-- Posts list -->
        <div class="w-full mt-4">
            <div class="px-2">
                <div>
                    <h2 class="uppercase text-center text-2xl font-2xl font-hairline">ASSIGNMENT LIST</h2>
                </div>
                <div class="text-right">
                    <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded md:hover:bg-blue-500" href="{{route('admin.assignments.create')}}">
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ASSIGNMENT</th>
                                    <th scope="col" class="px-2 py-4" width="20%">FROM</th>
                                    <th scope="col" class="px-2 py-4" width="15%">TO</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PUBLISHED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">DEADLINE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">FILE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @if(!empty($assignments))
                                @foreach($assignments as $assignment)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$assignment->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($assignment->teachers->isNotEmpty())
                                            @foreach($assignment->teachers as $teacher)
                                                {{$teacher->user->salutation}} {{$teacher->user->full_name}}
                                            @endforeach
                                            @elseif($assignment->students->isNotEmpty())
                                            @foreach($assignment->students as $student)
                                                {{$student->user->full_name}}
                                            @endforeach
                                            @elseif($assignment->staffs->isNotEmpty())
                                            @foreach($assignment->staffs as $staff)
                                                {{$staff->user->salutation}} {{$staff->user->full_name}}
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($assignment->streams->isNotEmpty())
                                            @foreach($assignment->streams as $stream)
                                                {{$stream->name}}
                                            @endforeach
                                            @elseif($assignment->students->isNotEmpty())
                                            @foreach($assignment->students as $student)
                                                {{$student->full_name}}
                                            @endforeach
                                            @elseif($assignment->staffs->isNotEmpty())
                                            @foreach($assignment->staffs as $staff)
                                                {{$staff->full_name}}
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $assignment->getDate() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $assignment->getDeadline() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <a href="{{route('admin.assignment.download',$assignment->id)}}">
                                            <x-pdf-svg/>
                                        </a>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.assignments.destroy',$assignment->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.assignments.show', $assignment->id) }}">
                                                <x-show-svg/>
                                            </a>
                                            <a href="{{ route('admin.assignments.edit', $assignment->id) }}">
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
                                <tr>
                                    <td colspan="10" class="w-full text-center text-white bg-blue-900 uppercase tracking-tighter h-12 dark:bg-gray-800 dark:text-slate-400">
                                        <div>Assignments Notyet populated.</div>
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
  </x-backend-main>
@endcan
@endrole
@endsection








