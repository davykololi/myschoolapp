@extends('layouts.admin')
@section('title', '| Payment Sections')

@section('content')
@role('admin')
@can('accountsAdmin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="mx-2 md:mx-8 lg:mx-8">
    @include('partials.messages')
    @include('partials.errors')
    <!-- Posts list -->
    @if(!empty($paymentSections))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="front-h2">PAYMENT SECTIONS LIST</h2>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <x-search-form/>
                <a href="{{route('admin.payment-sections.create')}}" class="sm:mt-4">
                    <x-button class="create-button">CREATE</x-button>
                </a>
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
                                    <th scope="col" class="px-2 py-4" width="20%">DESCRIPTION</th>
                                    <th scope="col" class="px-2 py-4" width="15%">AMOUNT</th>
                                    <th scope="col" class="px-2 py-4" width="15%">REF NO</th>
                                    <th scope="col" class="px-2 py-4" width="5%">ALLOCATED?</th>
                                    <th scope="col" class="px-2 py-4" width="5%">PDF</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ACTION</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @foreach($paymentSections as $key => $paymentSection)
                                <tr class="border-b dark:border-neutral-500 dark:bg-gray-800">
                                    <td class="whitespace-nowrap p-2">
                                        <div>
                                            {{ $paymentSections->perPage() * ($paymentSections->currentPage() - 1) + $key + 1 }}
                                        </div>
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
                                        <div>
                                            @if($paymentSection->payments->isNotEmpty())
                                                <button class="success-button">
                                                    YES
                                                </button>
                                            @else
                                                <button class="danger-button">
                                                    NO
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-2">
                                        <div>
                                            @if($paymentSection->payments->isNotEmpty())
                                            <form action="{{ route('admin.studentsAllocatedToPaymentSection') }}" method="GET">
                                                @csrf
                                                <input type="hidden" name="payment_section_ref_no" value="{{ $paymentSection->ref_no }}">
                                                <x-button type="submit" class="block">
                                                    <x-carbon-document-pdf class="w-8 h-8 bg-orange-500 text-white p-1 rounded mx-1"/>
                                                </x-button>    
                                            </form>
                                            @else
                                            <button class="danger-button">{{ __('NULL') }}</button>
                                            @endif
                                        </div>
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
                            <tfoot>
                                    @if($paymentSections->isEmpty())
                                    <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                        {{ __('NOT AVAILABLE')}}.
                                    </td>
                                    @endif
                                </tfoot>
                        </table>
                    </div>
                    <div class="my-4">
                        {{ $paymentSections->links() }}
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
