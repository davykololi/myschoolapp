@extends('layouts.admin')
@section('title', '| All Intakes')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($intakes))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>INTAKES LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.intakes.create')}}"> Add Intake</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.intakehead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($intakes as $intake)
                        <tr>
                            <td class="table-text">
                                <div>{{$intake->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$intake->desc}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.intakes.destroy',$intake->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.intakes.show', $intake->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.intakes.edit', $intake->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
