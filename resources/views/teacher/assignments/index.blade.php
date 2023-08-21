<x-teacher>
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen">
<!-- Posts list -->
    @if(!empty($assignments))
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
        <div class="flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ASSIGNMENT</th>
                                    <th scope="col" class="px-2 py-4" width="15%">TO</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PUBLISHED</th>
                                    <th scope="col" class="px-2 py-4" width="15%">DEADLINE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">FILE</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @forelse($assignments as $assignment)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$assignment->name}}</div>
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
                                        <div>
                                            <a type="button" href="{{route('teacher.assignment.download',$assignment->id)}}" class="bg-orange-500 inline-flex px-2 py-1 mb-0.5 justify-center items-center rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-flex pb-0.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('teacher.assignments.destroy',$assignment->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('teacher.assignments.show', $assignment->id) }}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a type="button" href="{{ route('teacher.assignments.edit', $assignment->id) }}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                                </svg>
                                            </a>
                                            <button type="submit" class="bg-red-700 text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$assignment->name}}?')">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                </svg>
                                            </button>
                                        </form> 
                                    </td>
                            @empty
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-gray-700 dark:text-slate-400">
                                        {{ __('I have notyet given out any assignment') }}
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
  </x-frontend-main>
</x-teacher>









