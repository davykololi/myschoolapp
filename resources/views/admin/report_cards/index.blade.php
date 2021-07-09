@extends('layouts.admin')
@section('title', '| All Report Cards')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    @include('partials.errors')
    <!-- Posts list -->
    @if(!empty($reports))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>REPORT CARDS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.delete.reports')}}">Delete All</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.reporthead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td class="table-text">
                                <div>{{$report->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$report->maths_mark}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$report->english_mark}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$report->kisw_mark}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$report->science_mark}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$report->cre_mark}}</div>
                            </td>
                            <td>
                                <a href="{{ route('admin.reports.show', $report->id) }}" class="btn btn-success btn-xs">Details</a>     
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
