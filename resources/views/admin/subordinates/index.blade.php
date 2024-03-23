@extends('layouts.admin')
@section('title', '| Admin Subordinate Staffs')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.messages')
            <!-- Posts list -->
            @if(!empty($staffs))
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>SUBSTAFF LIST</h2>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('admin.school.staffs', Auth::user()->school->id)}}">
                            <x-pdf-svg/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                        <!-- Table Headings -->
                        <thead>
                            <th width="25%">NAME</th>
                            <th width="20%">EMAIL</th>
                            <th width="15%">EMP NO.</th>
                            <th width="20%">ID</th>
                            <th width="20%">PHONE NO.</th>
                        </thead>
                        <!-- Table Body -->
                        <tbody>
                            @foreach($staffs as $staff)
                            <tr>
                                <td class="table-text">
                                    <div>{{$staff->title}} {{$staff->full_name}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$staff->email}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$staff->emp_no}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$staff->id_no}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$staff->phone_no}}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
</x-backend-main>
@endsection
