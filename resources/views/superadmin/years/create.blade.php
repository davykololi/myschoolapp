@extends('layouts.superadmin')
@section('title', '| Add Year')

@section('content')
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        @include('partials.errors')
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="card-header">
                <h5 class="card-title">CREATE YEAR</h5> 
                <a href="{{ route('superadmin.years.index') }}" class="btn btn-primary pull-right">
                    <i class="fas fa-angle-double-left">Back</i>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.years.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Year</label>
                        <div class="col-sm-10">
                            <select name="year">
                            @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                <option value="{{$year}}">
                                    {{$year}}
                                </option>
                            @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
