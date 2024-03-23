@extends('layouts.admin')
@section('title', '| Edit Student Details')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
@role('admin')
@can('studentRegistrar')
    <section class=" py-1 bg-blueGray-50">
        <div class="w-full px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0 dark:bg-stone-700 dark:text-slate-200">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-800">
                            Edit Student Details
                        </h6>
                        <x-back-button/>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="{{ route('admin.students.update', $student->id) }}" method="post" class="mt-8" enctype="multipart/form-data">
                        @include('ext._csrfdiv')
                        <input type="hidden" name="_method" value="PUT">
                        @include('ext._student_edit_form')
                        <div>
                            <select id="active" type="active" value="{{old('active')}}" class="w-[150px] bg-transparent text-white border rounded" name="active">
                                <option value="1">{{__('Active')}}</option>
                                <option value="0">{{__('Inactive')}}</option>
                            </select>
                        </div>                
                        <button type="submit" class="bg-gray-900 md:hover:bg-white md:hover:text-black md:hover:border-blue-800 items-center text-white px-6 py-0.5 border-2 mt-2 border-white rounded-md" {{ $student->lock }}>
                            Update
                        </button> 
                    </form>
                </div>
            </div>
        </div>
    </section>    
</x-backend-main>
@endcan
@endrole
@endsection
