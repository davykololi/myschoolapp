@extends('layouts.admin')
@section('title', '| Parents List')

@section('content')
@role('admin')
@can('studentRegistrar')
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            @if(!empty($myParents))
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>PARENTS LIST</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('admin.parents.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="20%">EMAIL</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ID NO.</th>
                                    <th scope="col" class="px-2 py-4" width="15%">PHONE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">?CHILDREN</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach($myParents as $parent)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$parent->user->salutation}} {{$parent->user->full_name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$parent->user->email}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$parent->id_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{$parent->phone_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($parent->children->isNotEmpty())
                                            <div class="text-green-800">{{ __('YES') }}</div>
                                            @else
                                            <div class="text-red-700">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <form action="{{route('admin.parents.destroy',$parent->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                                <a href="{{ route('admin.parents.show', $parent->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a href="{{ route('admin.parents.edit', $parent->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')" {{ $parent->lock }}>
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
</div>
</x-backend-main>
@endcan
@endrole
@endsection
