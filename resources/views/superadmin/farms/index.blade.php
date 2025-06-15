@extends('layouts.superadmin')
@section('title', '| Farms List')

@section('content')
@role('superadmin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full p-8 md:p-4 lg:p- shadow-2xl">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($farms))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>FARMS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.farms.create')}}"> Add Farm</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900 flex-grow">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="10%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="45%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="30%">CATEGORY</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($farms as $key => $farm)
                                <tr class="border-b dark:border-neutral-500 bg-transparent dark:bg-gray-800">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            {{ $farms->perPage() * ($farms->currentPage() - 1) + $key + 1 }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$farm->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$farm->type}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('superadmin.farms.destroy',$farm->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('superadmin.farms.show', $farm->id) }}">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('superadmin.farms.edit', $farm->id) }}">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure to delete?')">
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
@endrole
@endsection
