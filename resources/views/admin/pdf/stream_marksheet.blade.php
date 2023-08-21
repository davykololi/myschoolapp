@extends('layouts.pdf_landscape_marksheet')
@section('title', '| Stream Marksheets')

@section('content')
    <table class="table table-bordered">
        <caption class="table_caption">
            <h2 class="title" style="margin-top: -30px;"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr style="color:white;background-color: black;">
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>ADM MRKS</b></td>
                <td><b>RATE</b></td>
                <td><b>MATHS</b></td>
                <td><b>ENG</b></td>
                <td><b>KISW</b></td>
                <td><b>CHEM</b></td>
                <td><b>BIO</b></td>
                <td><b>PHYSICS</b></td>
                <td><b>CRE</b></td>
                <td><b>ISLAM</b></td>
                <td><b>HIST</b></td>
                <td><b>GHC</b></td>
                <td><b>TOTAL</b></td>
                <td><b>MEAN</b></td>
                <td><b>P/F</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($marks))
            @forelse($marks as $rank => $mark)
            <tr>
                @foreach($rankings as $name => $pos)
                @if($name === $mark->name && $pos['score'] === $mark->total)
                <td>{{ $pos['rank'] }}</td>
                @endif
                @endforeach
                <td class="table-left" style="text-transform: uppercase;">{{ $mark->name }}</td>

                @foreach($mark->stream->students as $st)
                @if($st->admission_no === $mark->admission_no && $mark->total <= $st->adm_mark)
                <td class="table-left">{{ $st->adm_mark }} <span style="color: red;margin-left:2px">*</span></td>
                @elseif($st->admission_no === $mark->admission_no && $mark->total > $st->adm_mark)
                <td class="table-left">{{ $st->adm_mark }} <span style="color: green;margin-left:2px">*</span></td>
                @endif
                @endforeach

                <!-- Rate the student -->
                @if($mark->total >= 400)
                        <td>
                            <div> EXCELENT</div>
                        </td>
                        @elseif(($mark->total >= 370) && ($mark->total < 400))
                        <td>
                            <div> V.GOOD</div>
                        </td>
                        @elseif(($mark->total >= 340) && ($mark->total < 370))
                        <td>
                            <div>GOOD</div>
                        </td>
                        @elseif(($mark->total >= 300) && ($mark->total < 370))
                        <td>
                            <div style="color:red">BELOW PAR</div>
                        </td>
                        @else
                        <td>
                            <div style="color:red">DOING POORLY</div>
                        </td>
                        @endif
                
                <td>{{ $mark->mathematics }}</td>
                <td>{{ $mark->english }}</td>
                <td>{{ $mark->kiswahili }}</td>
                <td>{{ $mark->chemistry ?? '-' }}</td>
                <td>{{ $mark->biology ?? '-' }}</td>
                <td>{{ $mark->physics ?? '-' }}</td>
                <td>{{ $mark->cre ?? '-' }}</td>
                <td>{{ $mark->islam ?? '-' }}</td>
                <td>{{ $mark->history ?? '-' }}</td>
                <td>{{ $mark->ghc ?? '-' }}</td>
                <td >{{ $mark->total }}</td>
                <td>{{ $mark->student_minscore }}</td>
                @if($passMark > $mark->total)
                <td><span style="color: red">F</span></td>
                @else
                <td><span style="color: green">P</span></td>
                @endif
            @empty
                <td colspan="10" style="color: red">
                    {{$title}} Not Found.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td><b>#</b></td>
                <td><b>MEAN SCORES</b></td>
                <td><b>#</b></td>
                <td><b>#</b></td>
                <td><b>{{ round($maths->avg(),1) }}</b></td>
                <td><b>{{ round($english->avg(),1) }}</b></td>
                <td><b>{{ round($kiswahili->avg(),1) }}</b></td>
                <td><b>{{ round($chemistry->avg(),1) ? : null ?? '-' }}</b></td>
                <td><b>{{ round($biology->avg(),1) ? : null ?? '-' }}</b></td>
                <td><b>{{ round($physics->avg(),1) ? : null ?? '-' }}</b></td>
                <td><b>{{ round($cre->avg(),1) ? : null ?? '-' }}</b></td>
                <td><b>{{ round($islam->avg(),1) ? : null ?? '-' }}</b></td>
                <td><b>{{ round($history->avg(),1) ? : null ?? '-' }}</b></td>
                <td><b>{{ round($ghc->avg(),1) ? : null ?? '-' }}</b></td>
                <td><b>{{ round($totals->avg(),1) }}</b></td>
                <td><b>#</b></td>
                <td><b>#</b></td>
            </tr>
        </tfoot>
    </table>
    <div style="margin-left: 150px">
        <br/><br/>
        <b><u>NB:</u></b>
        <ul>
            <li><span style="margin: 20px">P/F</span>: PASS OR FAIL</li>
            <li><span style="margin: 20px">PASS MARK: {{ $passMark }} MARKS</span></li>
            <li><span style="color: green;margin: 20px">P</span>: ABOVE PASS MARK</li>
            <li><span style="color: red;margin: 20px">F</span>: BELOW PASS MARK</li>
        </ul>
    </div>          
@endsection
