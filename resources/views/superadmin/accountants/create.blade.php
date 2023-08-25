@extends('layouts.superadmin')
@section('title', '| Add Accountant')

@section('content')
<x-backend-main>
    <section class="max-w-full py-1 bg-blueGray-50">
        <div class="w-full px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0 dark:bg-stone-700 dark:text-slate-200">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-800">
                            Accountant Registration
                        </h6>
                        <x-back-button/>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-4">
                    <form action="{{ route('superadmin.accountants.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @include('ext._csrfdiv')
                        @include('ext._first_common_detailsdiv')
                        @include('ext._second_common_detailsdiv')
                        <div class="flex flex-col md:flex-row lg:flex-row">
                            <div class="w-full md:w-1/3 lg:w-1/3 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" htmlfor="grid-password">Accountant Role:</label>
                                    @include('ext._attach_accountant_rolediv')
                                </div>
                            </div>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            More Information
                        </h6>
                        <div class="flex flex-col md:flex-row lg:flex-row">
                            <div class="w-full lg:w-12/12 px-2">
                                <div class="relative w-full mb-3">
                                    <label class="form-input-label-one" htmlfor="grid-password">
                                        More Information About Accountant
                                    </label>
                                    @include('ext._content_div')
                                    @error('history')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Password
                        </h6>
                        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                            @include('ext._passworddiv')
                        </div>
                        @include('ext._submit_register_button')
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-backend-main>
@endsection
