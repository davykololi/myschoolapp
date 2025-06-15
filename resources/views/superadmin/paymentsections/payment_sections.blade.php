@extends('layouts.superadmin')
@section('title', '| Superadmin Payment Sections')

@section('content')
@role('superadmin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
    @include('partials.messages')
    @include('partials.errors')
    <!-- Posts list -->
    @if(!empty($paymentSections))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>PAYMENT SECTIONS LIST</h2>
                </div>
            </div>
            <div>
                <x-search-form/>
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
                                    <th scope="col" class="px-2 py-4" width="20%">REF NO</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ALLOCATED?</th>
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
                                                <button class="px-2 py-1 bg-green-800 text-white items-center rounded-md">
                                                    YES
                                                </button>
                                            @else
                                                <button class="px-2 py-1 bg-red-800 text-white items-center rounded-md">
                                                    NO
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                @if($paymentSections->isEmpty())
                                <td colspan="12" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter dark:bg-gray-800 dark:text-slate-400 h-12 text-2xl">
                                    {{ __('Payment Sections Notyet Populated')}}.
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
@endrole
@endsection
