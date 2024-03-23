@extends('layouts.admin')
@section('title', '| Admin Clubs List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full container">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($clubs))
        <div class="max-w-full mb-8">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>CLUBS LIST</h2>
                </div>
                <div>
                    <a href="{{ route('admin.school.clubs') }}" style="float: right;">
                        <x-generate-pdf/>
                    </a>
                </div>
                <div class="text-center uppercase italic font-hairline">
                    @include('partials.errors');
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col overflow-x-auto mt-12">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900 flex-grow">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="35%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="10%">STUDENTS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">TEACHERS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">SUBORDINATES</th>
                                    <th scope="col" class="px-2 py-4" width="20%">REG. DATE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($clubs as $club)
                                <tr class="border-b dark:border-neutral-500 dark:bg-gray-800">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$club->name}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$club->students->count()}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$club->teachers->count()}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$club->subordinates->count()}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$club->regDate()}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <a href="{{ route('admin.clubs.show', $club->id) }}">
                                            <x-show-svg/>
                                        </a>
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
@endsection
