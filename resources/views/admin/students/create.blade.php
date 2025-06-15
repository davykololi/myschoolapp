@extends('layouts.admin')
@section('title', '| Student Registration')

@section('content')
@role('admin')
@can('studentRegistrar')
<!-- frontend-main view -->
<x-backend-main>
    <section class=" py-1 bg-blueGray-50">
        <div class="w-full px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0 dark:bg-stone-700 dark:text-slate-200">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-800">
                            Student Registration
                        </h6>
                        <x-back-button/>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form id="ajax-reg" method="post" enctype="multipart/form-data" action="{{ route('admin.students.store') }}">
                        @csrf
                        @include('ext.student_registration_form')
                        <div class="flex flex-col mt-4">
                            <div class="w-full md:w-[200px] items-center justify-center">
                                <button type="submit" class="register-button">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 
</x-backend-main>
@endcan
@endrole
@endsection
