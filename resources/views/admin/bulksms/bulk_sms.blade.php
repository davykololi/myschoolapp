@extends('layouts.admin')
@section('title', '| Send Bulk SMS')

@section('content')
@role('admin')
@can('dataOfficer')
<!-- backend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full mx-auto text-center mb-4 mt-8">
                <h2 class="admin-h2 md:scale3d-150 lg:scale3d-150">BULK SMS</h2>
            </div>
            <div class="mx-2 md:mx-16 lg:mx-16 font-hairline my-8">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div>
                <form id="marksheets_form" action="{{ route('admin.sendBulkSms') }}" class="card-one" method="POST">
                    {{ csrf_field() }}
                    <div class="flex flex-col md:flex-row gap-4 mt-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            @include('ext._attach_teachers_phone_numbers')
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            @include('ext._attach_parents_phone_numbers')
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            @include('ext._attach_matrons_phone_numbers')
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mt-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            @include('ext._attach_subordinates_phone_numbers')
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            @include('ext._attach_librarians_phone_numbers')
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            @include('ext._attach_admins_phone_numbers')
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mt-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            @include('ext._attach_accountants_phone_numbers')
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mt-4 items-center justify-center">
                            <button type="submit" class="m-2 bg-black text-white justufy-center items-center">SEND</button>
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

