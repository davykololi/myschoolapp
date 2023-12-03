@extends('layouts.pdf_portrait')
@section('title', '| Stream Fee Balances')

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
                            <td width="25%"><b>BALANCE</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($streamStudents))
                        @foreach($streamStudents as $key => $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="left">{{ $value->full_name}}</td>
                            @if($value->gender === "Male")
                            <td class="left">{{ __('M') }}</td>
                            @elseif($value->gender === "Female")
                            <td class="left">{{ __('F') }}</td>
                            @endif
                            <td class="left">{{ $value->admission_no }}</td>
                
                            @if($value->fee_balance != null)
                            <td style="color: red;">
                                <span class="left">Kshs:</span>
                                <span style="float:right;">{{ number_format($value->fee_balance,2) }}</span>
                            </td>
                            @else
                            <td style="color:green;">
                                <span class="left">Kshs:</span>
                                <span style="float:right;">{{ number_format($value->fee_balance,2) }}</td>
                            @endif
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
                                    <span style="float: right;"><b>{{ $streamTotalBalance }}</b></span>
                                </p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>               
@endsection