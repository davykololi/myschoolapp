@extends('layouts.superadmin')
@section('title', '| Parents List')

@section('content')
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <div>
                <div>
                    <div class="pull-left">
                        <h2>PARENTS LIST</h2>
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
                                        <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                        <th scope="col" class="px-2 py-4" width="20%">EMAIL</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ID NO.</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                        <th scope="col" class="px-2 py-4" width="5%">BANNED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">BANNED ST</th>
                                        <th scope="col" class="px-2 py-4" width="5%">LOCKED</th>
                                        <th scope="col" class="px-2 py-4" width="10%">LOCKED ST</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($parents))
                                    @foreach($parents as $parent)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }} </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $parent->user->salutation }} {{$parent->user->full_name}}</div>
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
                                            @if($parent->is_banned == 1)
                                            <div class="text-[red]">{{ __('YES') }}</div>
                                            @else
                                            <div class="text-[green]">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                @if($parent->is_banned == 0)
                                                <form action="{{ route('superadmin.parent.bann',$parent->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-red-700 px-4 py-1 rounded">BAN</button>
                                                </form>
                                                @elseif($parent->is_banned == 1)
                                                <form action="{{ route('superadmin.parent.unbann',$parent->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-green-800 px-4 py-1 rounded">
                                                        LIFT BAN
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($parent->lock === "disabled")
                                            <div class="text-[green]">{{ __('YES') }}</div>
                                            @else
                                            <div class="text-[red]">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>
                                                @if($parent->lock === "enabled")
                                                <form action="{{ route('superadmin.parent.lock',$parent->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-[green]">LOCK</button>
                                                </form>
                                                @elseif($parent->lock === "disabled")
                                                <form action="{{ route('superadmin.parent.unlock',$parent->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-[red]">UNLOCK</button>
                                                </form>
                                                @endif
                                            </div>
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
