@extends('layouts.superadmin')
@section('title', '| Subordinate Staff List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>SUBORDINATE STAFF LIST</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('superadmin.subordinates.create')}}">Create</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto mt-12">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="15%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="15%">ROLE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">EMAIL</th>
                                        <th scope="col" class="px-2 py-4" width="10%">EMP NO.</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ID</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE NO.</th>
                                        <th scope="col" class="px-2 py-4" width="5%">BANNED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">STATUS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($subordinates))
                                    @foreach($subordinates as $subordinate)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{$loop->iteration}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{ $subordinate->user->salutation }} {{ $subordinate->user->full_name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{ $subordinate->position->value }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{ $subordinate->user->email }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{ $subordinate->emp_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{ $subordinate->id_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{ $subordinate->phone_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            @if($subordinate->is_banned == 1)
                                            <div class="text-[red]">{{ __('YES') }}</div>
                                            @else
                                            <div class="text-[green]">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                @if($subordinate->is_banned == 0)
                                                <form action="{{ route('superadmin.subordinate.bann',$subordinate->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-red-700 px-4 py-1 rounded">BAN</button>
                                                </form>
                                                @elseif($subordinate->is_banned == 1)
                                                <form action="{{ route('superadmin.subordinate.unbann',$subordinate->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-green-800 px-4 py-1 rounded">
                                                        LIFT BAN
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <form action="{{route('superadmin.subordinates.destroy',$subordinate->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('superadmin.subordinates.show', $subordinate->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a type="button" href="{{ route('superadmin.subordinates.edit', $subordinate->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete {{ $subordinate->user->full_name }}?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
