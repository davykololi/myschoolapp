<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_report_head')
</head>
<body class="page-break">
    @include('partials.pdf_receipt_header')
    @include('partials.student_pdf_results_footer')
    <br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="line-height: -10px;">
                        <h2 class="title">
                            <u style="font-family: impact">{{$title}}</u>
                        </h2>
                        <h3 style="text-transform: uppercase;">
                            {{ $paymentRecord->payment->title}} {{ __('Amount')}} 
                            <b>Kshs:</b>{{ number_format($paymentRecord->payment->amount,2) }}
                        </h3>
                        <p style="font-size: 14px;text-transform: uppercase;">
                            <u><b>REF NO:</b> {{ $paymentRecord->ref_no }}</u>
                        </p>
                        <p style="font-size: 14px;text-transform: uppercase;">
                            <u><b>Payment Bank:</b> {{ $paymentRecord->bank_name }}</u>
                        </p>
                        <p style="font-size: 14px;text-transform: uppercase;">
                            <u><b>Payment Date:</b> {{ $paymentRecord->payment_date }}</u>
                        </p>
                        <p style="font-size: 14px;text-transform: uppercase;">
                            <u><b>Original Receipt No:</b> {{ $paymentRecord->payment_receipt_ref }}</u>
                        </p>
                        <p style="font-size: 14px;text-transform: uppercase;">
                            <u><b>Amount Paid:</b> Kshs: {{ number_format($paymentRecord->amount_paid,2) }}</u>
                        </p>
                        <p style="font-size: 14px;text-transform: uppercase;">
                            <u><b>Balance C/F:</b> Kshs: {{ number_format($paymentRecord->balance,2) }}</u>
                        </p>
                        <p style="font-size: 14px;text-transform: uppercase;">
                            <u><b>Verification Date:</b> {{ $paymentRecord->updated_at }}</u>
                        </p>
                        <div>
                            @if($paymentRecord->verified === 1)
                            <img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/static/seal.jpg'))) !!}" width="150px" height="150px" align="left">
                            @else
                            <p>Not Verified</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
