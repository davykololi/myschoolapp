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
        @endif
    </div>
</div>
</x-frontend-main>
@endsection
