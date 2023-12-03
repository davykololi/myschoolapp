<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_portrait_head')
</head>
<body class="page-break" style="width: 100%">
    @include('partials.pdf_receipt_header')
    @include('partials.pdf_portrait_school_footer')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="line-height: -10px;">
                        <h2 class="title">
                            <u style="font-family: impact">{{$title}}</u>
                        </h2>
                        <div style="margin-left: 350px;">
                            <h3 style="text-transform: uppercase;">
                                <u>{{ $student }}</u>
                            </h3>
                            <p style="text-transform: uppercase;font-size: 20px;">
                                <b>Payment For:</b> {{ $paymentRecord->payment->title}}
                            </p>
                            <p>
                                <b>Payment Amount</b> Kshs: {{ number_format($paymentRecord->payment->amount,2) }}
                            </p>
                            <p>{!! DNS1D::getBarcodeHTML('4445645656', 'CODABAR',3,50,'black', true) !!}</p>
                            <p style="font-size: 18px;text-transform: uppercase;">
                                <u><b>REF NO:</b> {{ $paymentRecord->ref_no }}</u>
                            </p>
                            <p style="font-size: 18px;text-transform: uppercase;">
                                <u><b>Payment Bank:</b> {{ $paymentRecord->bank_name }}</u>
                            </p>
                            <p style="font-size: 18px;text-transform: uppercase;">
                                <u><b>Payment Date:</b> {{ $paymentRecord->payment_date }}</u>
                            </p>
                            <p style="font-size: 18px;text-transform: uppercase;">
                                <u><b>Original Receipt No:</b> {{ $paymentRecord->payment_receipt_ref }}</u>
                            </p>
                            <p style="font-size: 18px;text-transform: uppercase;">
                                <u><b>Amount Paid:</b> Kshs: {{ number_format($paymentRecord->amount_paid,2) }}</u>
                            </p>
                            <p style="font-size: 18px;text-transform: uppercase;">
                                <u><b>Balance C/F:</b> Kshs: {{ number_format($paymentRecord->balance,2) }}</u>
                            </p>
                            <p style="font-size: 18px;text-transform: uppercase;">
                                <u><b>Verification Date:</b> {{ $paymentRecord->created }}</u>
                            </p>
                            <div>
                                @if($paymentRecord->verified === 1)
                                {!! DNS2D::getBarcodeHTML($paymentRecord->payment_receipt_ref, 'QRCODE',8,8) !!}
                                @else
                                <p>Not Verified</p>
                                @endif
                            </div>
                            <div style="margin-top: 10px;"><b>Served By:</b> <u>{{ Auth::user()->full_name }}</u></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
