@extends('layouts.accountant')
@section('title', '| Payment Queries')

@section('content')
@role('accountant')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            @if(!empty($students))
            <div class="w-full">
                <div class="">
                    <div class="text-center mb-4">
                        <h2 class="uppercase text-lg font-bold underline">STUDENTS FEE QUERRIES</h2>
                    </div>
                    <div class="pt-8 uppercase text-center font-2xl">
                        @include('partials.messages')
                        @include('partials.errors')
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('accountant.student.paymentStatement') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">STUDENT PAYMENT STATEMENT</div>
                        @include('ext._get_students_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('accountant.stream.balances') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">STREAM FEE BALANCES</div>
                        @include('ext._get_streams_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('accountant.class.balances') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">CLASS FEE BALANCES</div>
                        @include('ext._attach_classdiv')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3 lg:w-1/3">
                    <form id="marksheets_form" action="{{ route('accountant.paymentsBy.refNo') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">PAYMENTS BY REF NUMBER</div>
                        <div>
                            <input type="text" name="payment_ref_no" class="bg-transparent w-full rounded" placeholder="Enter Reference Number">
                        </div>
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
