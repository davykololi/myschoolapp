@extends('layouts.superadmin')
@section('title', '| Years')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($years))
        <div class="row">
            <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                     <h2>YEARS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.years.create')}}">Create Year</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.yearhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($years as $key => $year)
                        <tr>
                            <td class="table-text">
                                <div>{{$year->year}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$year->desc}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.years.destroy',$year->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.years.show', $year->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('superadmin.years.edit', $year->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')">
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
