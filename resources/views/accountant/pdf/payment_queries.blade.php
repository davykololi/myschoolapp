@extends('layouts.accountant')
@section('title', '| Payment Queries')

@section('content')
    <!-- backend-main view -->
    <x-frontend-main>
    <div class="w-full mx-auto text-center mb-4">
        <h2 class="text-2xl font-extrabold">PAYMENT QUERIES</h2>
        <div class="pt-4 font-hairline mt-8">
            @include('partials.messages')
            @include('partials.errors')
        </div>
    </div>

    <form id="marksheets_form" action="#" class="p-4 border-2 border-white mb-6" method="get">
        {{ csrf_field() }}
        <div class="font-bold mb-4">STREAM RESULTS PDF</div>
        
            <div class="flex flex-col md:flex-row mt-4">
                <div class="w-full mt-2">
                    <div class="form-group">
                        <input type="number" name="pass_mark" min="0" class="w-full md:w-1/4 dark:bg-slate-900 dark:text-slate-400" placeholder="Enter Passmark">
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="mt-4">
                    <x-generate-button/>
                </div>
            </div>
    </form>
    
    
    <form id="marksheets_form" action="#" class="p-4 border-2 border-white mb-6" method="get">
        {{ csrf_field() }}
        <div class="font-bold mb-4">STREAM RESULTS EXCEL</div>


            <div class="w-full">
                <div class="mt-4">
                    <x-generate-button/>
                </div>
            </div>
    </form>

    <form id="marksheets_form" action="#" class="p-4 border-2 border-white mb-6" method="get">
        {{ csrf_field() }}
        <div class="font-bold mb-4">CLASS RESULTS PDF</div>


        <div class="flex flex-col md:flex-row mt-4">
            <div class="w-full mt-2">
                <div class="form-group">
                    <input type="number" name="pass_mark" min="0" class="w-full md:w-1/4 dark:bg-slate-900 dark:text-slate-400" placeholder="Enter Passmark">
                </div>
            </div>
        </div>
        <div class="w-full">
            <div class="mt-4">
                <x-generate-button/>
            </div>
        </div>
    </form>

    <form id="marksheets_form" action="#" class="p-4 border-2 border-white mb-6" method="get">
        {{ csrf_field() }}
        <div class="font-bold mb-4">CLASS RESULTS EXCEL</div>
        

        <div class="w-full">
            <div class="mt-4">
                <x-generate-button/>
            </div>
        </div>
    </form>
    <form id="marksheets_form" action="#" class="p-4 border-2 border-white mb-6" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="font-bold mb-4">UPLOAD MARK SHEETS</div>
            
        <div class="w-full">
            <div class="mt-4">
                <x-upload-button/>
            </div>
        </div>
    </form>
    <form id="marksheets_form" action="#" class="p-4 border-2 border-white mb-6" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="font-bold mb-4">UPLOAD SUBJECTS GRADE SHEETS</div>
        
        <div class="w-full">
            <div class="mt-4">
                <x-upload-button/>
            </div>
        </div>
    </form>
    <form id="marksheets_form" action="#" class="p-4 border-2 border-white mb-6" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="font-bold mb-4">UPLOAD GENERAL GRADE SHEETS FOR AN EXAM</div>
            
        <div class="w-full">
            <div class="mt-4">
                <x-upload-button/>
            </div>
        </div>
    </form>
    </x-frontend-main>
@endsection

