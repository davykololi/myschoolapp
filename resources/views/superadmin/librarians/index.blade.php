<x-superadmin>
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($librarians))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>LIBRARIANS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.librarians.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="10%">ROLE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">EMAIL</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ID NO.</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">EMP NO.</th>
                                    <th scope="col" class="px-2 py-4" width="5%">BANNED</th>
                                    <th scope="col" class="px-2 py-4" width="10%">STATUS</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($librarians as $librarian)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$librarian->title}} {{$librarian->full_name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            {{ $librarian->role->name }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$librarian->email}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$librarian->id_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$librarian->phone_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$librarian->emp_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($librarian->is_banned == 1)
                                        <div class="text-[red]">{{ __('YES') }}</div>
                                        @else
                                        <div class="text-[green]">{{ __('NO') }}</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($librarian->is_banned == 0)
                                            <form action="{{ route('superadmin.librarian.bann',$librarian->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="text-[red]">BANN</button>
                                            </form>
                                            @elseif($librarian->is_banned == 1)
                                            <form action="{{ route('superadmin.librarian.unbann',$librarian->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="text-[green]">LIFT BANN</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.librarians.destroy',$librarian->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('superadmin.librarians.show', $librarian->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('superadmin.librarians.edit', $librarian->id) }}" class="edit">
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
