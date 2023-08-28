<x-superadmin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($matrons))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>MATRONS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.matrons.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="15%">EMAIL</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ID NO.</th>
                                    <th scope="col" class="px-2 py-4" width="15%">PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">EMP NO.</th>
                                    <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($matrons as $matron)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$matron->title}} {{$matron->full_name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$matron->email}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$matron->id_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$matron->phone_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$matron->emp_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.matrons.destroy',$matron->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('superadmin.matrons.show', $matron->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('superadmin.matrons.edit', $matron->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure to delete?')">
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
