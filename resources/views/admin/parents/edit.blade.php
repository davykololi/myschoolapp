@extends('layouts.admin')
@section('title', '| Edit Parent')

@section('content')
@role('admin')
@can('studentRegistrar')
<x-backend-main>
    <section class=" py-1 bg-blueGray-50">
        <div class="w-full px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0 dark:bg-stone-700 dark:text-slate-200">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-800">
                            Edit Parent Details
                        </h6>
                        <x-back-button/>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="{{ route('admin.parents.update', $myParent->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @include('ext._csrfdiv')
                        <input type="hidden" name="_method" value="PUT">
                        @include('ext.parent_edit_form')
                        @include('ext._submit_update_button')
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-backend-main>
@endcan
@endrole
@endsection
