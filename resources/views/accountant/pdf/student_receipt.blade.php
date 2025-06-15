<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.reciept_portrait_head')
</head>
<body class="page-break" style="width: 100%">
    @include('partials.pdf_receipt_header')
    @include('partials.receipt-background-image')
    @include('partials.pdf-receipt-footer')
    <div class="container" style="z-index: 50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="line-height: -10px;margin-left: 20px;margin-right: 240px">
                        <h3 class="receipt-title">
                            <u>{{$title}}</u>
                        </h3>
                        <div>
                            <div style="line-height:16px;font-family: Calibri;font-size: 16px;">
                                <div class="mb">
                                    <span class="uppercase"><b class="mnb">NAME: </b>
                                        <span class="receipt-name">{{ $studentName }}</span>
                                    </span>
                                    <span class="uppercase right"><b class="mnb">CLASS: </b>
                                        <span class="receipt-name">{{ $stream }}</span>
                                    </span>
                                </div>
                                <div class="mb">
                                    <span class="uppercase"><b class="mnb">AMOUNT PAID: </b>
                                        <span class="receipt-name">
                                            Kshs: {{ number_format($paymentRecord->amount_paid,2) }}
                                        </span>
                                    </span>
                                    <span class="uppercase right"><b class="mnb">BALANCE: </b>
                                        <span class="receipt-name">
                                            Kshs: {{ number_format($paymentRecord->student->fee_balance,2) }}
                                        </span>
                                    </span>
                                </div>
                                <div class="mb">
                                    <span class="uppercase"><b class="mnb">Amount Paid In Words: </b>
                                        <span class="receipt-name">
                                            {{ ucwords($amountPaidInWords) }} {{__('Kenyan Shillings Only')}}
                                        </span>
                                    </span>
                                </div>
                                <div class="mb">
                                    <span class="uppercase"><b class="mnb">ORIGINAL REF NO: </b>
                                        <span class="receipt-name">{{ $paymentRecord->payment_ref_code }}</span>
                                    </span>
                                    <span class="uppercase right"><b class="mnb">REF NO: </b>
                                        <span class="receipt-name">{{ $paymentRecord->ref_no }}</span>
                                    </span>
                                </div>
                                <div class="mb">
                                    <span class="uppercase"><b class="mnb">BEING PAYMENT FOR: </b>
                                        <span class="receipt-name">{{ $paymentFor }}</span>
                                    </span>
                                    <span class="uppercase right"><b class="mnb">PAYMENT MODE: </b>
                                        <span class="receipt-name">{{ $paymentRecord->payment_mode }}</span>
                                    </span>
                                </div>
                                <div class="mb">
                                    <span class="uppercase"><b class="mnb">PAYMENT DATE: </b>
                                        <span class="receipt-name">{{ $paymentRecord->payment_date }}</span>
                                    </span>
                                    <span class="uppercase right"><b class="mnb">VERIFICATION DATE: </b>
                                        <span class="receipt-name">{{ $paymentRecord->created }}</span>
                                    </span>
                                </div>
                                <div class="mb" style="margin-top: 20px">
                                    <span class="uppercase"><b class="mnb">SERVED BY: </b>
                                        <span class="receipt-name">
                                            {{ Auth::user()->salutation }} {{ Auth::user()->first_name }}
                                        </span>
                                    </span>
                                    <span class="uppercase right"><b class="mnb">SIGNATURE: </b>
                                        <span>{{ __('.....................................') }}</span>
                                    </span>
                                </div>
                                <div class="mb" style="margin-top: 80px;width: 100%;">
                                    <span>
                                        @if($paymentRecord->verified === 1)
                                            <img src="data:image/png;base64,{!! base64_encode(QrCode::size(120)->generate($qrcode)) !!}" align="right" style="margin-top: -50px;">
                                        @else
                                        Not Verified
                                        @endif
                                    </span>
                                    <span style="margin-top: -40px;float: right;margin-right: 20px;">
                                        {!! DNS1D::getBarcodeHTML($paymentRecord->barcode, 'CODE11',3,50,'black', true) !!}
                                    </span>
                                </div>
                                <div style="margin-top: 80px;">
                                    <i style="color: midnightblue;">
                                        {{ $paymentRecord->payment->payment_section->reciept_footer_info }}
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
