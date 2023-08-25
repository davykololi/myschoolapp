@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| Student Payment Details')

@section('content')
<div class="container-fluid box"> 
    <h3 class="title" style="margin-top: -20px"><u>{{$title}}</u></h3>
    <div>
    <table>
        <thead>
            <tr style="background-color: black; color: white;">
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>AMOUNT</b></td>
                <td><b>PAID</b></td>
                <td><b>PAYMENT DATE</b></td>
                <td><b>RECEIPT NO.</b></td>
                <td><b>BANK</b></td>
                <td><b>BALANCE</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($studentPayments))
            @foreach($studentPayments as $key => $studentPayment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $studentPayment->title }}
                </td>
                <td>
                    Kshs:{{ number_format($studentPayment->amount,2) }}
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p style="border-bottom: 1px solid black;">Kshs: {{ number_format($paymentRecord->amount_paid,2) }}</p>
                @empty
                    <p style="border-bottom: 1px solid black;">{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p style="border-bottom: 1px solid black;">{{ $paymentRecord->payment_date }}</p>
                @empty
                    <p style="border-bottom: 1px solid black;">{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p style="border-bottom: 1px solid black;">{{ $paymentRecord->payment_receipt_ref }}</p>
                @empty
                    <p style="border-bottom: 1px solid black;">{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p style="border-bottom: 1px solid black;">{{ $paymentRecord->bank_name }}</p>
                @empty
                    <p style="border-bottom: 1px solid black;">{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p style="border-bottom: 1px solid black;">Kshs: {{ number_format($paymentRecord->balance,2) }}</p>
                @empty
                    <p style="border-bottom: 1px solid black;">{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td>#</td>
                <td>#</td>
                <td><b>Kshs:{{ number_format($student->total_payment_amount,2) }}</b></td>
                <td><b>Kshs:{{ number_format($student->paid_amount,2) }}</b></td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td><b>Kshs:{{ number_format($student->fee_balance,2) }}</b></td>
            </tr>
        </tfoot>
    </table>
    </div>
</div>               
@endsection