@extends('layouts.superadmin')
@section('title', '| Terms')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($terms))
        <div class="row">
            <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                     <h2>TERMS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.terms.create')}}">Create Term</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.termhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($terms as $key => $term)
                        <tr>
                            <td class="table-text">
                                <div>{{$term->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$term->code}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.terms.destroy',$term->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.terms.show', $term->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('superadmin.terms.edit', $term->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
