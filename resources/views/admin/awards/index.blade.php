@extends('layouts.admin')
@section('title', '| Awards List')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($awards))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>AWARDS LIST</h2>
                </div>
                <div style="float:right">
                    <a type="button" class="bg-blue-700 text-white px-2 py-1 rounded" href="{{route('admin.awards.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900 flex-grow">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="15%">DATE</th>
                                    <th scope="col" class="px-2 py-4" width="35%">PURPOSE</th>
                                    <th scope="col" class="px-2 py-4" width="25%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($awards as $award)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$award->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{\Carbon\Carbon::parse($award->date)->format('d-m-Y')}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$award->purpose}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <form action="{{route('admin.awards.destroy',$award->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.awards.show', $award->id) }}">
                                                <x-carbon-show-data-cards class="w-8 h-8 bg-blue-700 text-white p-1 rounded mx-1"/>
                                            </a>
                                            <a type="button" href="{{ route('admin.awards.edit', $award->id) }}">
                                                <x-carbon-edit class="w-8 h-8 bg-yellow-500 text-white p-1 rounded mx-1"/>
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                                <x-carbon-trash-can class="w-8 h-8 bg-red-700 text-white p-1 rounded mx-1"/>
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
