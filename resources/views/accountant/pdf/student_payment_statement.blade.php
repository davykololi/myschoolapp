@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| Student Payment Details')

@section('content')
<div class="container-fluid box"> 
    <div>
        <p style="font-size: 25px;margin-top: -20px;text-align: right;">
            <b>Date:</b> <u style="margin-right: 40px">{!! date('d/m/Y') !!}</u>
        </p>
    </div>
    <div><h3 class="title" style="margin-top: -20px"><u>{{$title}}</u></h3></div>
    <div>
    <table>
        <thead>
            <tr>
                <td width="5%"><b>NO</b></td>
                <td width="15%"><b>REF NO</b></td>
                <td width="10%"><b>AMOUNT</b></td>
                <td width="10%"><b>PAID</b></td>
                <td width="10%"><b>PAID ON</b></td>
                <td width="15"><b>RECEIPT NO.</b></td>
                <td width="10%"><b>BANK</b></td>
                <td width="25%"><b>BALANCE</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($studentPayments))
            @foreach($studentPayments as $key => $studentPayment)
            <tr style="line-height: 3px;">
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $studentPayment->ref_no }}
                </td>
                <td>
                    <p>
                        <span style="float: left;"><b>Kshs:</b></span> 
                        <span style="float: right;">{{ number_format($studentPayment->amount,2) }}</span>
                    </p>
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p>
                        <span style="float: left;"><b>Kshs:</b></span> 
                        <span style="float: right;">{{ number_format($paymentRecord->amount_paid,2) }}</span>
                    </p>
                @empty
                    <p>{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p>{{ $paymentRecord->payment_date }}</p>
                @empty
                    <p>{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p>{{ $paymentRecord->payment_receipt_ref }}</p>
                @empty
                    <p>{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p>{{ $paymentRecord->bank_name }}</p>
                @empty
                    <p>{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
                <td>
                @if(!empty($studentPayment->payment_records))
                @forelse($studentPayment->payment_records as $paymentRecord)
                    <p>
                        <span style="float: left;"><b>Kshs:</b></span> 
                        <span style="float: right;">{{ number_format($paymentRecord->balance,2) }}</span>
                    </p>
                @empty
                    <p>{{ __('----------------------------') }}</p>
                @endforelse
                @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="table-footer">
                <td><p class="ft-line-height">#</p></td>
                <td>
                    <p class="ft-line-height">
                        <b>SUMMARY</b>
                    </p>
                </td>
                <td>
                    <p class="ft-line-height">
                        <span class="left"><b>Kshs:</b></span>
                        <span style="float: right;">{{ number_format($student->total_payment_amount,2) }}</span>
                    </p>
                </td>
                <td>
                    <p class="ft-line-height">
                    <span class="left"><b>Kshs:</b></span>
                    <span style="float: right;">{{ number_format($student->paid_amount,2) }}</span>
                    </p>
                </td>
                <td><p class="ft-line-height">#</p></td>
                <td><p class="ft-line-height">#</p></td>
                <td><p class="ft-line-height">#</p></td>
                <td>
                    <p class="ft-line-height">
                        <span style="float: left;"><b>Kshs:</b></span>
                        <span style="float: right;"><b>{{ number_format($student->fee_balance,2) }}</b></span>
                    </p>
                </td>
            </tr>
        </tfoot>
    </table>
    </div>
</div>               
@endsection