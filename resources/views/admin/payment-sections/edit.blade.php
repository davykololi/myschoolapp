@extends('layouts.admin')
@section('title', '| Edit Payment Section')

@section('content')
@role('admin')
@can('accountsAdmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT PAYMENT SECTION</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.payment-sections.update', $paymentSection->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $paymentSection->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" value="{{ $paymentSection->description }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Payment Amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="payment_amount" id="payment_amount" class="form-control" value="{{ $paymentSection->payment_amount }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Reference Number</label>
                        <div class="col-sm-10">
                            <input type="text" name='ref_no' id="ref_no" class="form-control" value="{{ $paymentSection->ref_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Reciept Footer Message</label>
                        <div class="col-sm-10">
                            <input type="text" name="reciept_footer_info" id="reciept_footer_info" class="form-control" value="{{ $paymentSection->reciept_footer_info }}">
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endcan
@endrole
@endsection
