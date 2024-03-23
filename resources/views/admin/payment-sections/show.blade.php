@extends('layouts.admin')
@section('title', '| Department Section Details')

@section('content')
@role('admin')
@can('accountsAdmin')
<main class="container max-w-screen">
    <div class="row">
    @include('partials.messages')
    <div class="">
        <div class="mt-8">
            <h2 class="uppercase text-center text-2xl font-bold">{{ $paymentSection->name }} Details</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Payment Section Name:</strong>
            {{ $paymentSection->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $paymentSection->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $paymentSection->name }} Payments:</strong>
            <ol>
            @forelse($paymentSectionPayments as $payment)
                <li>{{ $payment->name }}</li>
            @empty
            <p>This {{ $paymentSection->name }} has no payments at the moment.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endcan
@endrole
@endsection
