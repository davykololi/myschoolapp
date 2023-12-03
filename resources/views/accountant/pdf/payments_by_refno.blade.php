@extends('layouts.pdf_portrait')
@section('title', '| Payments By Reference Number')

@section('content')
<div class="container"> 
    <div>
        <div>
            <x-pdf-portrait-current-date/>
            <div><h3 class="title"><u>{{$title}}</u></h3></div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td width="10%"><b>NO</b></td>
                            <td width="40%"><b>NAME</b></td>
                            <td width="5%"><b>SEX</b></td>
                            <td width="20%"><b>ADM NO</b></td>
                            <td width="25%"><b>AMOUNT</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($payments))
                        @foreach($payments as $payment)
                        <tr>
                            <td class="left">{{ $loop->iteration }}</td>
                            <td class="left">{{ $payment->student->full_name}}</td>
                            @if($payment->student->gender === "Male")
                            <td class="left">{{ __('M') }}</td>
                            @elseif($payment->student->gender === "Female")
                            <td class="left">{{ __('F') }}</td>
                            @endif
                            <td>{{ $payment->student->admission_no }}</td>
                            <td style="color: red;">
                                <span class="left">Kshs:</span>
                                <span style="float: right;">{{ number_format($payment->amount,2) }}</span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>               
@endsection