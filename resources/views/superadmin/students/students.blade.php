@extends('layouts.superadmin')
@section('title', '| Superadmin Students List')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen page-container">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            @if(!empty($students))
            <div class="w-full">
                <div class="">
                    <div class="text-center py-2">
                        <h2 class="uppercase text-2xl font-bold underline">STUDENTS LIST</h2>
                    </div>
                    <div class="uppercase text-center font-2xl">
                        @include('partials.messages')
                        @include('partials.errors')
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto md:mx-2">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ADM NO</th>
                                        <th scope="col" class="px-2 py-4" width="15%">CLASS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">BANNED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">BANNED ST</th>
                                        <th scope="col" class="px-2 py-4" width="10%">LOCKED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">LOCK ST</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach($students as $student)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->user->full_name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->admission_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->stream->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $student->phone_no }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($student->is_banned == 1)
                                            <div class="text-[red]">{{ __('YES') }}</div>
                                            @else
                                            <div class="text-[green]">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                @if($student->is_banned == 0)
                                                <form action="{{ route('superadmin.student.bann',$student->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-red-700 px-4 py-1 rounded">BAN</button>
                                                </form>
                                                @elseif($student->is_banned == 1)
                                                <form action="{{ route('superadmin.student.unbann',$student->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-green-800 px-4 py-1 rounded">
                                                        LIFT BAN
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($student->lock === "disabled")
                                                <div class="text-[green]">{{ __('YES') }}</div>
                                            @else
                                                <div class="text-[red]">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                @if($student->lock === "enabled")
                                                <form action="{{ route('superadmin.student.lock',$student->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit">
                                                        <x-academicon-open-access class="w-8 h-8 text-red-800"/>
                                                    </button>
                                                </form>
                                                @elseif($student->lock === "disabled")
                                                <form action="{{ route('superadmin.student.unlock',$student->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit">
                                                        <x-academicon-closed-access class="w-8 h-8 text-green-800"/>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <div class="my-4 dark:text-slate-200">
                                        {{ $students->links() }}
                                    </div>
                                </tfoot>
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
@endsection
