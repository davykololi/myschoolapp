<x-admin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full md:p-8 lg:p-8 shadow-2xl">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($exams))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>EXAMS LIST</h2>
                </div>
                <div style="float:right">
                    <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded" href="{{route('admin.exams.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="15%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="10%">STATUS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">START ON</th>
                                    <th scope="col" class="px-2 py-4" width="10%">END ON</th>
                                    <th scope="col" class="px-2 py-4" width="10%">?MARKS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">?SBJCT GRADES</th>
                                    <th scope="col" class="px-2 py-4" width="10%">?GEN GRADES</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($exams as $key => $exam)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $exam->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($exam->status === 1)
                                        <div>
                                            <button class="bg-green-800 text-white px-2 w-24 animate-pulse rounded">{{ __('CURRENT') }}</button>
                                        </div>
                                        @else
                                        <div><button class="bg-red-600 text-white px-2 w-24 rounded">{{ __('RESERVED') }}</button></div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $exam->start_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $exam->end_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($exam->marks->isNotEmpty())
                                                <button class="bg-green-800 text-white px-2 py-1 rounded">YES</button>
                                            @else
                                                <button class="bg-red-600 text-white px-2 py-1 rounded">NO</button>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($exam->grades->isNotEmpty())
                                            <button class="bg-green-800 text-white px-2 py-1 rounded">YES</button>
                                        @else
                                            <button class="bg-red-600 text-white px-2 py-1 rounded">NO</button>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($exam->general_grades->isNotEmpty())
                                                <button class="bg-green-800 text-white px-2 py-1 rounded">YES</button>
                                            @else
                                                <button class="bg-red-600 text-white px-2 py-1 rounded">NO</button>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.exams.destroy',$exam->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.exams.show', $exam->id) }}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a type="button" href="{{ route('admin.exams.edit', $exam->id) }}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                Edit
                                            </a>
                                            <button type="submit" class="bg-red-700 text-white px-2 py-1 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$exam->name}}?')">
                                                Delete
                                            </button>
                                        </form>
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
</x-backend-main>
</x-admin>
