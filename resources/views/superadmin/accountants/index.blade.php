@extends('layouts.superadmin')
@section('title', '| Accountants List')

@section('content')
@role('superadmin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen page-container">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            <h2 class="front-h2">ACCOUNTANTS LIST</h2>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <x-search-form/>
                <a href="{{route('superadmin.accountants.create')}}" class="sm:mt-4">
                    <x-button class="create-button">CREATE</x-button>
                </a>
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
                                        <th scope="col" class="px-2 py-4" width="10%">EMAIL</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ID NO.</th>
                                        <th scope="col" class="px-2 py-4" width="10%">PHONE</th>
                                        <th scope="col" class="px-2 py-4" width="5%">BANNED?</th>
                                        <th scope="col" class="px-2 py-4" width="5%">STATUS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">IMPERSONATE</th>
                                        <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if(!empty($accountants))
                                    @foreach($accountants as $key => $accountant)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                {{ $accountants->perPage() * ($accountants->currentPage() - 1) + $key + 1 }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{$accountant->user->salutation}} {{$accountant->user->full_name}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{$accountant->position->value}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{$accountant->user->email}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{$accountant->id_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>{{$accountant->phone_no}}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            @if($accountant->is_banned == 1)
                                            <div class="text-[red]">{{ __('YES') }}</div>
                                            @else
                                            <div class="text-[green]">{{ __('NO') }}</div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <div>
                                                @if($accountant->is_banned == 0)
                                                <form action="{{ route('superadmin.accountant.bann',$accountant->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="ban-button">BAN</button>
                                                </form>
                                                @elseif($accountant->is_banned == 1)
                                                <form action="{{ route('superadmin.accountant.unbann',$accountant->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="text-white bg-green-800 px-4 py-1 rounded">
                                                        LIFT BAN
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @canBeImpersonated($accountant->user,$guard=null)
                                            <a href="{{route('superadmin.impersonate',$accountant->user->id)}}" data-toggle='tooltip' data-placement='top' title="Impersonate" class="icon-style">
                                                <button type="submit" class="impersonate-button">IMPERSONATE</button>
                                            </a> 
                                            @endCanBeImpersonated
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-4">
                                            <form action="{{route('superadmin.accountants.destroy',$accountant->id)}}" method="POST" class="flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" href="{{ route('superadmin.accountants.show', $accountant->id) }}">
                                                    <x-show-svg/>
                                                </a>
                                                <a type="button" href="{{ route('superadmin.accountants.edit', $accountant->id) }}">
                                                    <x-edit-svg/>
                                                </a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                                    <x-delete-svg/>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($accountants->isEmpty())
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ __('The Accountants Notyet Populated')}}.
                                    </td>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="my-4">
                            {{ $accountants->links() }}
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
