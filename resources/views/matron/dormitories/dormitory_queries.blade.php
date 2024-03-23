@extends('layouts.matron')
@section('title', '| Dormitory Queries')

@section('content')
<x-frontend-main>
@role('matron')
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <!-- Posts list -->
            <div class="w-full">
                <div class="">
                    <div class="text-center mb-4">
                        <h2 class="uppercase text-2xl font-bold underline">DORMITORY QUERIES</h2>
                    </div>
                    <div class="pt-8 uppercase text-center font-2xl">
                        @include('partials.messages')
                        @include('partials.errors')
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('matron.dormitory.students') }}" class="shadowed-border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">DOMITORY STUDENTS</div>
                        @include('ext._get_dormitory_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-generate-button/>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('matron.student.bednumber') }}" class="shadowed-border" method="post">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">ASSIGN BED NUMBER TO STUDENT</div>
                        <div class="mb-2">
                        @include('ext._get_students_ids')
                        </div>
                        <div>
                            <input type="text" name="number" class="w-full rounded bg-transparent border" placeholder="Assign Bed Number">
                        </div>
                        <div class="w-full">
                            <div class="mt-4">
                                <x-assign-button/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
</x-frontend-main>
@endsection
