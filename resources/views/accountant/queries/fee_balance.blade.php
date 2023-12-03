@extends('layouts.accountant')
@section('title', '| Query Payment')

@section('content')
<x-frontend-main>
<div class="max-w-screen h-screen">
    <div class="w-full">
    <!-- Posts list -->
    @if(!empty($students))
        <div class="w-full">
            <div class="">
                <div class="text-center mb-4 -mt-8">
                    <h2 class="uppercase text-lg font-voodoo underline">STUDENTS FEE QUERRIES</h2>
                </div>
                <div class="pt-8 uppercase text-center font-2xl">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('accountant.student.paymentStatement') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">STUDENT PAYMENT STATEMENT</div>
                        @include('ext._get_students_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-generate-button/>
                            </div>
                        </div>
                </form>
            </div>
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('accountant.stream.balances') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">STREAM FEE BALANCES</div>
                        @include('ext._get_streams_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-generate-button/>
                            </div>
                        </div>
                </form>
            </div>
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('accountant.class.balances') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">CLASS FEE BALANCES</div>
                        @include('ext._attach_classdiv')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-generate-button/>
                            </div>
                        </div>
                </form>
            </div>
        </div>

        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3 lg:w-1/3">
                <form id="marksheets_form" action="{{ route('accountant.paymentsBy.refNo') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">PAYMENTS BY REF NUMBER</div>
                        <div>
                            <input type="text" name="payment_ref_no" class="bg-transparent w-full rounded" placeholder="Enter Reference Number">
                        </div>
                        <div class="w-full">
                            <div class="mt-4">
                                <x-generate-button/>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
</x-frontend-main>
@endsection
