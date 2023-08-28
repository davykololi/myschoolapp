<x-superadmin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($accountants))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ACCOUNTANTS LIST</h2>
                </div>
                <div style="float: right;">
                    <a href="{{ route('superadmin.accountants.create') }}" class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                        <svg class="inline-flex w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4m6-8L7 5l4 4"/>
                        </svg>
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
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ROLE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">EMAIL</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ID NO.</th>
                                    <th scope="col" class="px-2 py-4" width="15%">PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($accountants as $accountant)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$accountant->salutation}} {{$accountant->full_name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$accountant->role->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$accountant->email}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$accountant->id_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$accountant->phone_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.accountants.destroy',$accountant->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('superadmin.accountants.show', $accountant->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('superadmin.accountants.edit', $accountant->id) }}" class="edit">
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
