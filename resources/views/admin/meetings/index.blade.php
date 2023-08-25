<x-admin> 
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($meetings))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>MEETING LIST</h2>
                </div>
                <div style="float:right;">
                    <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded md:hover:bg-blue-500" href="{{route('admin.meetings.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="15%">DATE</th>
                                    <th scope="col" class="px-2 py-4" width="20%">VENUE</th>
                                    <th scope="col" class="px-2 py-4" width="20%">AGENDA</th>
                                    <th scope="col" class="px-2 py-4" width="20%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($meetings as $key => $meeting)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$meeting->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{\Carbon\Carbon::parse($meeting->date)->format('d-m-Y')}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$meeting->venue}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$meeting->agenda}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.meetings.destroy',$meeting->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.meetings.show', $meeting->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a href="{{ route('admin.meetings.edit', $meeting->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure to delete {{$meeting->name}}?')">
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
