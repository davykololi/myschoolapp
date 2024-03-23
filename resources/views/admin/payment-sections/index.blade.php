@extends('layouts.admin')
@section('title', '| Payment Sections')

@section('content')
@role('admin')
@can('accountsAdmin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($paymentSections))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>PAYMENT SECTIONS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.payment-sections.create')}}">Create</a>
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
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="25%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="25%">DESCRIPTION</th>
                                    <th scope="col" class="px-2 py-4" width="15%">PAYMENT AMOUNT</th>
                                    <th scope="col" class="px-2 py-4" width="15%">REF NO</th>
                                    <th scope="col" class="px-2 py-4" width="15%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @foreach($paymentSections as $paymentSection)
                                <tr class="border-b dark:border-neutral-500 dark:bg-gray-800">
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $paymentSection->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $paymentSection->description }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $paymentSection->payment_amount }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>{{ $paymentSection->ref_no }}</div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <form action="{{route('admin.payment-sections.destroy',$paymentSection->id)}}" method="POST" class="flex flex-row">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" href="{{ route('admin.payment-sections.show',$paymentSection->id) }}">
                                                <x-show-svg/>
                                            </a>
                                            <a type="button" href="{{ route('admin.payment-sections.edit',$paymentSection->id) }}">
                                                <x-edit-svg/>
                                            </a>
                                            <button type="submit" onclick="return confirm('Are you sure to delete {{$paymentSection->name}}?')">
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
@endcan
@endrole
@endsection
