<x-superadmin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($dormitories))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>DORMITORY LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.dormitories.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="15%">STUDENTS NO.</th>
                                    <th scope="col" class="px-2 py-4" width="15%">BED NO.</th>
                                    <th scope="col" class="px-2 py-4" width="20%">DORM HEAD</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($dormitories as $dormitory)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$dormitory->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$dormitory->students->count()}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$dormitory->bed_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$dormitory->dom_head}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.dormitories.destroy',$dormitory->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('superadmin.dormitories.show',$dormitory->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('superadmin.dormitories.edit', $dormitory->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure to delete {{$dormitory->name}}?')">
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
</x-superadmin>
