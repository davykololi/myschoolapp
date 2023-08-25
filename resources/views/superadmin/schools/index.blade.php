@extends('layouts.superadmin')
@section('title', '| All Schools')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($schools))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>SCHOOLS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ \URL::previous() }}"> Add School</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-bordered-bd-warning mt-4">
                    <!-- Table Headings -->
                    @include('partials.schoolhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($schools as $school)
                        <tr>
                            <td class="table-text">
                                <div>{{$school->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$school->type}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$school->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$school->postal_address}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.schools.destroy',$school->id)}}" method="POST">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{ route('superadmin.schools.show', $school->id) }}" class="show">
                                        <x-show-svg/>
                                    </a>
                                    <a href="{{ route('superadmin.schools.edit', $school->id) }}" class="edit">
                                        <x-edit-svg/>
                                    </a>
                                    <button type="submit" class="delete" onclick="return confirm('Are you sure to delete {{$school->name}}?')">
                                        <x-delete-svg/>
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
