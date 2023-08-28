<x-superadmin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($streams))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="mb-4">
                    <h2 class="text-center uppercase text-2xl font-bold underline">{{Auth::user()->school->name }} STREAMS</h2>
                </div>
                <div style="float:right" class="items-center justify-center">
                    <a type="button"  class="bg-blue-700 text-white px-2 py-1 rounded mx-2" href="{{route('superadmin.streams.create')}}">
                        <span class="material-icons">add</span>
                    </a>
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
                                    <th scope="col" class="px-2 py-4" width="20%">STREAM</th>
                                    <th scope="col" class="px-2 py-4" width="20%">STUDENTS</th>
                                    <th scope="col" class="px-2 py-4" width="15%">MALES</th>
                                    <th scope="col" class="px-2 py-4" width="15%">FEMALES</th>
                                    <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
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
                                        <div>{{ $stream->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $stream->students->count() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $stream->males() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $stream->females() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.streams.destroy',$stream->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded" href="{{ route('superadmin.streams.show',$stream->id) }}">
                                                <span class="material-icons">details</span>
                                            </a>
                                            <a type="button" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded" href="{{ route('superadmin.streams.edit',$stream->id) }}">
                                                <span class="material-icons">edit</span>
                                            </a>
                                            <button type="submit" class="bg-[red] text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete?')">
                                                <span class="material-icons">delete</span>
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
</x-superadmin>
