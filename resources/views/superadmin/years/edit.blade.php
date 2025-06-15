@extends('layouts.superadmin')
@section('title', '| Edit Year')

@section('content')
@role('superadmin')
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        @include('partials.errors')
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="card-header">
                <h5 class="card-title">EDIT YEAR</h5>
                <a href="{{ route('superadmin.years.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.years.update', $year->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Year</label>
                        <div class="col-sm-10">
                            <input type="text" name="year" id="year" class="form-control" value="{{ $year->year }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" value="{{ $year->desc }}">
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
