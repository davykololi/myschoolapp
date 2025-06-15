@extends('layouts.admin')
@section('title', '| Admin Sub Staffs')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <h1 class="front-h1">SUBORDINATE STAFF LIST</h1>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <x-search-form/>
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
                                        <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="15%">ROLE</th>
                                        <th scope="col" class="px-2 py-4" width="20%">EMAIL</th>
                                        <th scope="col" class="px-2 py-4" width="10%">EMP NO.</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ID</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">DETAILS</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($subordinates))
                                    @foreach($subordinates as $key => $subordinate)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                {{ $subordinates->perPage() * ($subordinates->currentPage() - 1) + $key + 1 }}
                                            </div>
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
                                            <div>
                                                <a href="{{ route('admin.view.substaff', $subordinate->id) }}"><x-show-svg/></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($subordinates->isEmpty())
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ Auth::user()->school->name }} {{ __('Subordinate Staffs Notyet Populated')}}.
                                    </td>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4">
                            {{ $subordinates->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
