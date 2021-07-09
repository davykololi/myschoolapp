@extends('layouts.superadmin')
@section('title', '| All Matrons')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($matrons))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>MATRONS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.matrons.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-bordered-bd-warning mt-4">
                    <!-- Table Headings -->
                    @include('partials.matronhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($matrons as $matron)
                        <tr>
                            <td class="table-text">
                                <div>{{$matron->title}} {{$matron->full_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$matron->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$matron->id_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$matron->phone_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$matron->emp_no}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.matrons.destroy',$matron->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.matrons.show', $matron->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('superadmin.matrons.edit', $matron->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
