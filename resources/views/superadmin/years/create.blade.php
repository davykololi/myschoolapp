@extends('layouts.superadmin')
@section('title', '| Add Year')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
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
                            {!! Form::selectYear('year',2020,8080) !!}
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
</main>
@endsection
