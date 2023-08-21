@extends('layouts.accountant')
@section('title', '| Query Payment')

@section('content')
<x-frontend-main>
<div class="max-w-screen">
    <div class="w-full">
    <!-- Posts list -->
    @if(!empty($students))
        <div class="w-full">
            <div class="">
                <div class="text-center mb-4">
                    <h2 class="uppercase text-2xl font-bold underline">STUDENTS FEE QUERRIES</h2>
                </div>
                <div class="pt-8 uppercase text-center font-2xl">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('accountant.student.paymentDetails') }}" class="p-4 border-2 border-white mb-6" method="get">
                    {{ csrf_field() }}
                    <div class="font-bold mb-4">STUDENT PAYMENT DETAILS</div>
                        @include('ext._get_students_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-generate-button/>
                            </div>
                        </div>
                </form>
            </div>

            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('accountant.stream.balances') }}" class="p-4 border-2 border-white mb-6" method="get">
                    {{ csrf_field() }}
                    <div class="font-bold mb-4">STREAM FEE BALANCES</div>
                        @include('ext._get_streams_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-generate-button/>
                            </div>
                        </div>
                </form>
            </div>
        </div>



        <div class="flex flex-col overflow-x-auto md:mx-2">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="15%">AVATAR</th>
                                    <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ADM NO</th>
                                    <th scope="col" class="px-2 py-4" width="20%">STREAM</th>
                                    <th scope="col" class="px-2 py-4" width="20%">BALANCE</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($students as $student)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 relative">
                                        <div>@include('partials.student-avatar')</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->title }} {{ $student->full_name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->admission_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->stream->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->fee_balance }}</div>
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
</x-frontend-main>
@endsection
