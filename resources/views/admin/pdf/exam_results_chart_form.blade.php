@extends('layouts.admin')
@section('title', '| MarkSheets Chart Form')

@section('content')
@role('admin')
@can('examRegistrar')
<!-- backend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full mx-auto text-center mb-4 mt-8">
                <h2 class="admin-h2 md:scale3d-150 lg:scale3d-150">MARKSHEETS CHART FORM</h2>
            </div>
            <div class="mx-2 md:mx-16 lg:mx-16 font-hairline my-8">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div>
                <form id="marksheets_form" action="{{ route('admin.examResultsStore.chart') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">CLASS RESULTS MARKSHEET CHART</h3>
                    @include('ext._class_results_form')
                    <div>
                        <div class="mt-4">
                            <x-generate-pdf/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
</x-backend-main>
@endcan
@endrole
@endsection

