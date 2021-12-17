@extends('layouts.admin')
@section('title', '| Exam Categories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categoryExams))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>EXAMS CATEGORIES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.category-exams.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="25%">NAME</th>
                        <th width="30%">DESCRIPTION</th>
                        <th width="20%">SLUG</th>
                        <th width="25%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($categoryExams as $key => $categoryExam)
                        <tr>
                            <td class="table-text">
                                <div>{{$categoryExam->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryExam->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryExam->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.category-exams.destroy',$categoryExam->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('admin.category-exams.show',$categoryExam->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('admin.category-exams.edit',$categoryExam->id)}}" class="btn btn-warning btn-xs">   Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$categoryExam->name}}?')">
                                        Delete
                                    </button>
                                </form>
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
