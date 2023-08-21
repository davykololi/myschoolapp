<x-teacher>
    <!-- frontend-main view -->
    <x-frontend-main>
    <div class="max-w-full">
    <div class="w-full">
    <!-- Posts list -->
    @if(!empty($streams))
        <div class="w-full">
            <div class="w-full">
                <div>
                    <h2 class="uppercase text-center font-bold text-2xl">STREAMS</h2>
                </div>
                <div class="text-center mt-4">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
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
                                    <th scope="col" class="px-2 py-4" width="25%">STREAM</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ASSIGNED?</th>
                                    <th scope="col" class="px-2 py-4" width="20%">SUBJECT</th>
                                    <th scope="col" class="px-2 py-4" width="10%">STUDENTS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">MALES</th>
                                    <th scope="col" class="px-2 py-4" width="10%">FEMALES</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($streams as $stream)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <a href="{{ route('teacher.stream.show', $stream->id) }}" class="hover:underline hover:text-purple-500">
                                            <div>{{ $stream->name }}</div>
                                        </a>
                                    </td>
                                    @if(!is_null($streamSubjectTeacher) && ($streamSubjectTeacher->stream->id === $stream->id) && (Auth::user()->id === $streamSubjectTeacher->teacher->id))
                                    <td class="whitespace-nowrap px-2 py-4 items-center justify-center">
                                        <div class="bg-[green] w-12 px-2 py-1 text-white rounded dark:bg-green-900 dark:text-slate-400">
                                            <a href="{{ route('teacher.stream.show', $stream->id) }}">
                                                {{ __('YES') }}
                                            </a>
                                        </div>
                                    </td>
                                    @else
                                    <td class="whitespace-nowrap px-2 py-4 items-center justify-center">
                                        <div class="bg-[red] w-12 px-2 py-1 text-white rounded dark:bg-red-900 dark:text-slate-400">
                                            <a href="{{ route('teacher.stream.show', $stream->id) }}">
                                                {{ __('NO') }}
                                            </a>
                                        </div>
                                    </td>
                                    @endif

                                    @if(!is_null($streamSubjectTeacher) && ($streamSubjectTeacher->stream->id === $stream->id) && (Auth::user()->id === $streamSubjectTeacher->teacher->id))
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $streamSubjectTeacher->subject->name }}</div>
                                    </td>
                                    @else
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ __('---------') }}</div>
                                    </td>
                                    @endif
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $stream->students->count() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $stream->males() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $stream->females() }}</div>
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
</x-frontend-main>
</x-teacher>



