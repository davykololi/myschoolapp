@extends('layouts.admin')
@section('title', '| Add Parent')

@section('content')
@role('admin')
@can('studentRegistrar')
<x-backend-main>
    <section class="max-w-full py-1 bg-blueGray-50">
        <div class="w-full px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0 dark:bg-stone-700 dark:text-slate-200">
                <div class="rounded-t bg-white mb-0 px-6 py-6 dark:bg-gray-200">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-800">
                            Parent Registration
                        </h6>
                        <x-back-button/>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-4 bg-gray-400 dark:bg-stone-500">
                    <form action="{{ route('admin.parents.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @include('ext._csrfdiv')
                        @include('ext.parent_registration_form')
                        @include('ext._submit_register_button')
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-backend-main>
@endcan
@endrole
@endsection
