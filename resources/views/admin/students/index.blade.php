<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
<div>
    <div class="w-full">
    <!-- Posts list -->
    @if(!empty($students))
        <div class="w-full">
            <div class="">
                <div class="text-center py-4">
                    <h2 class="uppercase text-2xl font-bold underline">STUDENTS LIST</h2>
                </div>
                <div class="items-center justify-center">
                    @can('studentRegistrar')
                    <a type="button" class="bg-blue-700 text-white p-2 rounded shadow-lg mx-2" href="{{route('admin.students.create')}}">
                        CREATE
                    </a>
                    @endcan
                    <a type="button" class="bg-[green] text-white p-2 rounded shadow-lg mx-2" href="{{route('admin.export.students')}}">
                        EXCEL
                    </a> 

                    <a href="{{route('admin.school.students', Auth::user()->school->id)}}" class="pdf">
                        <x-pdf-svg/>
                    </a>
                </div>
                <div class="pt-8 uppercase text-center font-2xl">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto md:mx-2">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="10%">AVATAR</th>
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ADM NO</th>
                                    <th scope="col" class="px-2 py-4" width="10%">CLASS</th>
                                    <th scope="col" class="px-2 py-4" width="5%">PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">EMAIL</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ROLE</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($students as $student)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 relative">
                                        <div>@include('partials.student-avatar')</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->title }} {{ $student->full_name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->admission_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->stream->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->phone_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->email }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($student->schoolStudentLeader())
                                            {{ __('Student Leader') }}
                                            @elseif($student->assSchoolStudentLeader())
                                            {{ __('Assistant Student Leader')}}
                                            @elseif($student->ordinaryStudent())
                                            {{ __('Ordinary Student')}}
                                            @elseif($student->streamPrefect())
                                            {{ __('Stream Prefect')}}
                                            @elseif($student->assistantStreamPrefect())
                                            {{ __('Assistant Stream Prefect')}}
                                            @elseif($student->timeKeeper())
                                            {{ __('Time Keeper')}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.students.destroy',$student->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.students.show', $student->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            @can('studentRegistrar')
                                            <a type="button" href="{{ route('admin.students.edit', $student->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            @endcan
                                            @can('studentRegistrar')
                                            <a type="submit" class="delete" onclick="return confirm('Are you sure to delete?')">
                                                <x-delete-svg/>
                                            </a>
                                            @endcan
                                            <a type="button" href="{{ route('admin.student.details', $student->id) }}" class="pdf">
                                                <x-pdf-svg/>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <div class="my-4 dark:text-slate-200">
                                    {{ $students->links() }}
                                </div>
                            </tfoot>
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
