<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($timetables))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>TIMETABLES LIST</h2>
                </div>
                <div style="float:right;">
                    <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded" href="{{route('admin.timetables.create')}}">
                        Create
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
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900 flex-grow">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="20%">TIMETABLE</th>
                                    <th scope="col" class="px-2 py-4" width="25%">FOR</th>
                                    <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($timetables as $timetable)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$timetable->desc}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            <a href="{{route('admin.timetable.download',$timetable->id)}}" class="btn btn-outline-warning">
                                                Download
                                            </a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$timetable->stream->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.timetables.destroy',$timetable->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.timetables.show', $timetable->id) }}" class="bg-green-800 text-white px-2 py-1 transition delay-300 duration-300 ease-in-out inline-flex mx-0.5 rounded">
                                                Details
                                            </a>
                                            <a type="button" href="{{ route('admin.timetables.edit', $timetable->id) }}" class="bg-yellow-500 text-white py-1 px-2 inline-flex mx-0.5 rounded">
                                                Edit
                                            </a>
                                            <button type="submit" class="bg-[red] text-white py-1 px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$timetable->desc}}?')">
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
