@extends('layouts.pdf_landscape_marksheet')
@section('title', '| Stream Marksheets')

@section('content')
    <table class="table table-bordered">
        <caption class="table_caption">
            <h2 class="title" style="margin-top: -30px;"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr style="color:white;background-color: black;">
                <td class="table-left padding-10"><b>NO</b></td>
                <td class="table-left padding-10"><b>NAME</b></td>
                <td class="table-left padding-10"><b>GDR</b></td>
                <td class="table-left padding-10"><b>STATUS</b></td>
                <td class="table-left padding-10"><b>RATE</b></td>
                <td class="table-left padding-10"><b>MATHS</b></td>
                <td class="table-left padding-10"><b>ENG</b></td>
                <td class="table-left padding-10"><b>KISW</b></td>
                <td class="table-left padding-10"><b>CHEM</b></td>
                <td class="table-left padding-10"><b>BIO</b></td>
                <td class="table-left padding-10"><b>PHYSICS</b></td>
                <td class="table-left padding-10"><b>CRE</b></td>
                <td class="table-left padding-10"><b>ISLAM</b></td>
                <td class="table-left padding-10"><b>HIST</b></td>
                <td class="table-left padding-10"><b>GHC</b></td>
                <td class="table-left padding-10"><b>TOTAL</b></td>
                <td class="table-left padding-10"><b>MEAN</b></td>
                <td class="table-left padding-10"><b>P/F</b></td>
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

                <!-- Gender -->
                @foreach($mark->class->students as $st)
                @if($st->admission_no === $mark->admission_no && $st->gender === 'Female')
                <td class="table-left">F</td>
                @elseif($st->admission_no === $mark->admission_no && $st->gender === 'Male')
                <td class="table-left">M</td>
                @endif
                @endforeach

                @foreach($mark->stream->students as $st)
                @if($st->admission_no === $mark->admission_no && $mark->total <= $st->adm_mark)
                <td class="table-left"><span style="color: red;">{{ __('DROP') }}</span></td>
                @elseif($st->admission_no === $mark->admission_no && $mark->total > $st->adm_mark)
                <td class="table-left"><span style="color: green;">{{ __('EXCEL') }}</span></td>
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
                
                <td class="table-left">
                    {{ $mark->mathematics }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Mathematics' ) && ($grade->from_mark <= $mark->mathematics) && ($grade->to_mark >= $mark->mathematics))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->english }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'English' ) && ($grade->from_mark <= $mark->english) && ($grade->to_mark >= $mark->english))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->kiswahili }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Kiswahili' ) && ($grade->from_mark <= $mark->kiswahili) && ($grade->to_mark >= $mark->kiswahili))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->chemistry ?? '-' }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Chemistry' ) && ($grade->from_mark <= $mark->chemistry) && ($grade->to_mark >= $mark->chemistry))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->biology ?? '-' }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Biology' ) && ($grade->from_mark <= $mark->biology) && ($grade->to_mark >= $mark->biology))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->physics ?? '-' }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Physics' ) && ($grade->from_mark <= $mark->physics) && ($grade->to_mark >= $mark->physics))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->cre ?? '-' }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'CRE' ) && ($grade->from_mark <= $mark->cre) && ($grade->to_mark >= $mark->cre))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->islam ?? '-' }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Islam' ) && ($grade->from_mark <= $mark->islam) && ($grade->to_mark >= $mark->islam))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->history ?? '-' }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'History' ) && ($grade->from_mark <= $mark->history) && ($grade->to_mark >= $mark->history))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td class="table-left">
                    {{ $mark->ghc ?? '-' }}
                    @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'GHC' ) && ($grade->from_mark <= $mark->ghc) && ($grade->to_mark >= $mark->ghc))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
                <td >{{ $mark->total }}</td>
                <td>
                    {{ $mark->student_minscore }}
                    @if(!empty($generalGrades))
                        @foreach($generalGrades as $genGrade)
                        @if(($genGrade->from_mark <= round($mark->student_minscore,0)) && ($genGrade->to_mark >= round($mark->student_minscore,0)))
                        {{ $genGrade->grade }}
                        @endif
                        @endforeach
                    @endif
                </td>
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
            <tr style="background-color: lightgray;">
                <td class="table-left padding-10"><b>#</b></td>
                <td class="table-left padding-10"><b>MEAN SCORES</b></td>
                <td class="table-left padding-10"><b>#</b></td>
                <td class="table-left padding-10"><b>#</b></td>
                <td class="table-left padding-10"><b>#</b></td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($maths->avg(),1) }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Mathematics') && ($grade->from_mark <= round($maths->avg(),0)) && ($grade->to_mark >= round($maths->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($english->avg(),1) }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'English') && ($grade->from_mark <= round($english->avg(),0)) && ($grade->to_mark >= round($english->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($kiswahili->avg(),1) }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Kiswahili') && ($grade->from_mark <= round($kiswahili->avg(),0)) && ($grade->to_mark >= round($kiswahili->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($chemistry->avg(),1) ? : null ?? '-' }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Chemistry') && ($grade->from_mark <= round($chemistry->avg(),0)) && ($grade->to_mark >= round($chemistry->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($biology->avg(),1) ? : null ?? '-' }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Biology') && ($grade->from_mark <= round($biology->avg(),0)) && ($grade->to_mark >= round($biology->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($physics->avg(),1) ? : null ?? '-' }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Physics') && ($grade->from_mark <= round($physics->avg(),0)) && ($grade->to_mark >= round($physics->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($cre->avg(),1) ? : null ?? '-' }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'CRE') && ($grade->from_mark <= round($cre->avg(),0)) && ($grade->to_mark >= round($cre->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($islam->avg(),1) ? : null ?? '-' }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'Islam') && ($grade->from_mark <= round($islam->avg(),0)) && ($grade->to_mark >= round($islam->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($history->avg(),1) ? : null ?? '-' }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'History') && ($grade->from_mark <= round($history->avg(),0)) && ($grade->to_mark >= round($history->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($ghc->avg(),1) ? : null ?? '-' }}
                        @if(!empty($examGrades))
                        @foreach($examGrades as $grade)
                        @if(($grade->subject->name === 'GHC') && ($grade->from_mark <= round($ghc->avg(),0)) && ($grade->to_mark >= round($ghc->avg(),0)))
                        {{ $grade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10"><b>{{ round($totals->avg(),1) }}</b></td>
                <td class="table-left padding-10">
                    <b>
                        {{ round($streamMiniscore,1) }}
                        @if(!empty($generalGrades))
                        @foreach($generalGrades as $genGrade)
                        @if(round($streamMiniscore,0) >= $genGrade->from_mark && round($streamMiniscore,0) <= $genGrade->to_mark)
                        {{ $genGrade->grade }}
                        @endif
                        @endforeach
                        @endif
                    </b>
                </td>
                <td class="table-left padding-10"><b>#</b></td>
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
