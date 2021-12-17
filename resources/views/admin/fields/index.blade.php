@extends('layouts.admin')
@section('title', '| All Fields')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($fields))
        <div class="row">
            <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                     <h2>FIELD LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.fields.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.fieldhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($fields as $key => $field)
                        <tr>
                            <td class="table-text">
                                <div>{{$field->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$field->category_field->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.fields.destroy',$field->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.fields.show', $field->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.fields.edit', $field->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
