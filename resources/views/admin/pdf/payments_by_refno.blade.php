@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| Payments By Reference Number')

@section('content')
<div class="container"> 
    <div>
        <div>
            <div class="mt" style="margin-right: 75px;"><x-pdf-landscape2-current-date/></div>
            <div><h3 class="title"><u>{{$title}}</u></h3></div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td width="5%"><b>NO</b></td>
                            <td width="30%"><b>NAME</b></td>
                            <td width="5%"><b>GDR</b></td>
                            <td width="15%"><b>ADM NO</b></td>
                            <td width="15%"><b>AMOUNT</b></td>
                            <td width="15%"><b>PAID</b></td>
                            <td width="15%"><b>BAL</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($payments))
                        @foreach($payments as $payment)
                        <tr>
                            <td class="left">{{ $loop->iteration }}</td>
                            <td class="left">{{ $payment->student->user->full_name}}</td>
                            @if($payment->student->gender === "Male")
                            <td class="left">{{ __('M') }}</td>
                            @elseif($payment->student->gender === "Female")
                            <td class="left">{{ __('F') }}</td>
                            @endif
                            <td>{{ $payment->student->admission_no }}</td>
                            <td>
                                <span class="left">Kshs:</span>
                                <span style="float: right;">{{ number_format($payment->amount,2) }}</span>
                            </td>
                            <td>
                                <span class="left">Kshs:</span>
                                <span style="float: right;">{{ number_format($payment->paid,2) }}</span>
                            </td>
                            <td>
                                <span class="left">Kshs:</span>
                                <span style="float: right;">{{ number_format($payment->balance,2) }}</span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="table-footer">
                            <td><p class="tf-line-height">#</p></td>
                            <td><p class="tf-line-height"><b>TOTAL</b></p></td>
                            <td><p class="tf-line-height">#</p></td>
                            <td><p class="tf-line-height">#</p></td>
                            <td>
                                <p class="tf-line-height">
                                    <span class="left"><b>Kshs:</b></span> 
                                    <span style="float: right;"><b>{{ $totalSum }}</b></span>
                                </p>
                            </td>
                            <td><p class="tf-line-height">#</p></td>
                            <td><p class="tf-line-height">#</p></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>               
@endsection