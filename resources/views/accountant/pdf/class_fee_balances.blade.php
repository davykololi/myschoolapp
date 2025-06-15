@extends('layouts.pdf_portrait')
@section('title', '| Class Fee Balances')

@section('content')
<div class="container"> 
    <div>
        <div>
            <div class="mt"><x-pdf-portrait-current-date/></div>
            <div><h3 class="title"><u>{{$title}}</u></h3></div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td width="5%"><b>NO</b></td>
                            <td width="40%"><b>NAME</b></td>
                            <td width="5%"><b>GDR</b></td>
                            <td width="5%"><b>STRM</b></td>
                            <td width="20%"><b>ADM NO</b></td>
                            <td width="25%"><b>BALANCE</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($classStudents))
                        @foreach($classStudents as $key => $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->user->full_name}}</td>
                            @if($value->gender === "Male")
                            <td class="left">{{ __('M') }}</td>
                            @elseif($value->gender === "Female")
                            <td class="left">{{ __('F') }}</td>
                            @endif
                            <td>{{ $value->stream->stream_section->initials }}</td>
                            <td>{{ $value->admission_no }}</td>
                
                            @if($value->fee_balance != null)
                            <td style="color: black;">
                                <span class="left">Kshs:</span> 
                                <span style="float:right;">{{ number_format($value->fee_balance,2) }}</span>
                            </td>
                            @else
                            <td style="color:green;">
                                <span class="left">Kshs:</span> 
                                <span style="float: right;">{{ number_format($value->fee_balance,2) }}</span>
                            </td>
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
                            <td><p class="tf-line-height">#</p></td>
                            <td>
                                <p class="tf-line-height">
                                    <span class="left"><b>Kshs:</b></span> 
                                    <span style="float: right;"><b>{{ $classTotalBalance }}</b></span>
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