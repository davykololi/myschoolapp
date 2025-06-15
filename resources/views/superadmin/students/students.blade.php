@extends('layouts.superadmin')
@section('title', '| Superadmin Students List')

@section('content')
@role('superadmin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen page-container">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            @if(!empty($students))
            <h2 class="front-h2">STUDENTS LIST</h2>
            <div class="uppercase text-center font-2xl">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center mb-4 mx-2">
                <x-search-form/>
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
                                        <th scope="col" class="px-2 py-4" width="10%">ADMNO</th>
                                        <th scope="col" class="px-2 py-4" width="15%">CLASS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">BANNED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">BANNEDST</th>
                                        <th scope="col" class="px-2 py-4" width="5%">LOCKED</th>
                                        <th scope="col" class="px-2 py-4" width="5%">LOCK</th>
                                        <th scope="col" class="px-2 py-4" width="10%">IMPERSONATE</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($students->isNotEmpty())
                                    @foreach($students as $key => $student)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                {{ $students->perPage() * ($students->currentPage() - 1) + $key + 1 }}
                                            </div>
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
                                                    <button type="submit" class="ban-button">BAN</button>
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
                                                        <x-academicon-closed-access class="w-8 h-8 text-yellow-600"/>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @canBeImpersonated($student->user,$guard=null)
                                            <a href="{{route('superadmin.impersonate',$student->user->id)}}" data-toggle='tooltip' data-placement='top' title="Impersonate" class="icon-style">
                                                <button type="submit" class="impersonate-button">IMPERSONATE</button>
                                            </a> 
                                            @endCanBeImpersonated
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($students->isEmpty())
                                    <tr>
                                        <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ Auth::user()->school->name }} has no students at the moment.
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4 text-white dark:text-slate-200">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
