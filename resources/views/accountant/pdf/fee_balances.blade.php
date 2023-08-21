@extends('layouts.pdf_portrait')
@section('title', '| Stream Fee Balances')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div style="margin-right: -50px;margin-top: -50px"><h3 class="title"><u>{{$title}}</u></h3></div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td><b>NO</b></td>
                            <td><b>NAME</b></td>
                            <td><b>GENDER</b></td>
                            <td><b>ADM NO</b></td>
                            <td><b>FEE BALANCE</b></td>
                            <td><b>BALANCES</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($streamStudents))
                        @foreach($streamStudents as $key => $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->full_name}}</td>
                            @if($value->gender === "Male")
                            <td class="table-left">{{ __('M') }}</td>
                            @elseif($value->gender === "Female")
                            <td class="table-left">{{ __('F') }}</td>
                            @endif
                            <td>{{ $value->admission_no }}</td>
                
                            @if($value->fee_balance != null)
                            <td>Kshs: {{ number_format($value->fee_balance,2) }}</td>
                            @else
                            <td>{{ __('Cleared') }}</td>
                            @endif

                            <td>{{ $stream->balances }}</td>
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