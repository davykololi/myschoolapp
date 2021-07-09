@extends('layouts.admin')
@section('title', '| All Exams')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($exams))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>EXAMS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.exams.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.examhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($exams as $key => $exam)
                        <tr>
                            <td class="table-text">
                                <div>{{$exam->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$exam->category_exam->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{\Carbon\Carbon::parse($exam->start_date)->format('d-m-Y')}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{\Carbon\Carbon::parse($exam->end_date)->format('d-m-Y')}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.exams.destroy',$exam->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$exam->name}}?')">
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
