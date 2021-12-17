@extends('layouts.superadmin')
@section('title', '| All Accountants')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($accountants))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ACCOUNTANTS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.accountants.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-bordered-bd-warning mt-4">
                    <!-- Table Headings -->
                    @include('partials.accountanthead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($accountants as $accountant)
                        <tr>
                            <td class="table-text">
                                <div>{{$accountant->title}} {{$accountant->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$accountant->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$accountant->id_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$accountant->phone_no}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.accountants.destroy',$accountant->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.accountants.show', $accountant->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('superadmin.accountants.edit', $accountant->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
