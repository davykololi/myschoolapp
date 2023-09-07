<x-admin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full md:p-4 lg:p-4 shadow-2xl">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($exams))
        <div class="flex flex-col overflow-x-auto">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-blue-300 dark:text-slate-400 dark:bg-slate-900">
                                <div class="w-full flex-col md:flex-row lg:flex-row">
                                    <div>
                                        <h1 class="font-bold text-lg">EXAMS LIST</h1>
                                    </div>
                                    <div style="float:right">
                                        <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded" href="{{route('admin.exams.create')}}">Create</a>
                                    </div>
                                </div>
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.
                                </p>
                            </caption>
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
                                <tr class="border-b dark:border-neutral-500 hover:bg-gray-50 dark:hover:text-white dark:hover:bg-stone-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="uppercase">{{ $exam->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($exam->status === 1)
                                        <div class="text-green-800 animate-pulse dark:text-green-400">{{ __('CURRENT') }}</div>
                                        @else
                                        <div class="text-red-700 dark:text-[red]">{{ __('RESERVED') }}</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $exam->start_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $exam->end_date }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($exam->marks->isNotEmpty())
                                        <div class="text-green-800 dark:text-green-400">YES</div>
                                        @else
                                        <div class="text-red-700 dark:text-[red]">NO</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($exam->grades->isNotEmpty())
                                        <div class="text-green-800 dark:text-green-400">YES</div>
                                        @else
                                        <div class="text-red-700 dark:text-[red]">NO</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($exam->general_grades->isNotEmpty())
                                        <div class="text-green-800 dark:text-green-400">YES</div>
                                        @else
                                        <div class="text-red-700 dark:text-[red]">NO</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.exams.destroy',$exam->id)}}" method="POST" class="inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.exams.show', $exam->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('admin.exams.edit', $exam->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure to delete {{$exam->name}}?')">
                                                <x-delete-svg/>
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
