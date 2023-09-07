<x-superadmin>       
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-lg">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($admins))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h1 class="uppercase text-center text-2xl font-bold underline mb-4">Admins List</h1>
                <div class="items-center justify-center my-4">
                    <a style="float: right;" class="bg-blue-700 text-white px-2 py-1 rounded dark:text-slate-400 dark:bg-gray-800" href="{{route('superadmin.admins.create')}}">
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
                                    <th scope="col" class="px-2 py-4" width="10%">ROLE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">EMAIL</th>
                                    <th scope="col" class="px-2 py-4" width="10%">BANNED</th>
                                    <th scope="col" class="px-2 py-4" width="15%">STATUS</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($admins as $admin)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$admin->salutation}} {{$admin->full_name}}</div>
                                    </td>
                                    
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if(!is_null($admin) && ($admin->seniorAdmin()))
                                        <div>{{ __('Senior Admin') }}</div>
                                        @elseif(!is_null($admin) && ($admin->deputySeniorAdmin()))
                                        <div>{{ __('Assistant Senior Admin') }}</div>
                                        @elseif(!is_null($admin) && ($admin->studentRegistrar()))
                                        <div>{{ __('Student Registrar') }}</div>
                                        @elseif(!is_null($admin) && ($admin->academicRegistrar()))
                                        <div>{{ __('Academic Registrar') }}</div>
                                        @elseif(!is_null($admin) && ($admin->examRegistrar()))
                                        <div>{{ __('Exam Registrar') }}</div>
                                        @else
                                        <div>{{ __('Ordinary Admin') }}</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$admin->phone_no}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$admin->email }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($admin->is_banned == 1)
                                        <div class="text-[red]">{{ __('YES') }}</div>
                                        @else
                                        <div class="text-[green]">{{ __('NO') }}</div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($admin->is_banned == 0)
                                            <form action="{{ route('superadmin.admin.bann',$admin->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="text-[red]">BANN</button>
                                            </form>
                                            @elseif($admin->is_banned == 1)
                                            <form action="{{ route('superadmin.admin.unbann',$admin->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="text-[green]">LIFT BANN</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.admins.destroy',$admin->id)}}" method="POST" class="flex flex-row">
                                            {{method_field('DELETE')}}
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <a type="button" href="{{ route('superadmin.admins.show', $admin->id) }}" class="show">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('superadmin.admins.edit', $admin->id) }}" class="edit">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure to delete {{$admin->full_name}}?')">
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
