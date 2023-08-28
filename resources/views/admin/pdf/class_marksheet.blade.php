@extends('layouts.pdf_landscape_marksheet')

@section('title')
    {{ $class->school->name }}
@endsection

@section('content')
<div class="container-fluid box"> 
    <div><h2 class="title"><u>{{$title}}</u></h2></div> 
    <div>
           <table>
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
                        <td class="table-left padding-10"><b>STRM</b></td>
                        <td class="table-left padding-10"><b>P/F</b></td>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($marks))
                    @forelse($marks as $key=>$mark)
                    <tr>
                        @foreach($rankings as $name=>$pos)
                        @if($name === $mark->name && $pos['score'] === $mark->total)
                        <td class="table-left">{{ $pos['rank'] }}</td>
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
                        
                        @foreach($mark->class->students as $st)
                        @if($st->admission_no === $mark->admission_no && $mark->total <= $st->adm_mark)
                         <td class="table-left"><span style="color: red;margin-left:2px">DROP</span></td>
                        @elseif($st->admission_no === $mark->admission_no && $mark->total > $st->adm_mark)
                            <td class="table-left"><span style="color: green;margin-left:2px">EXCEL</span></td>
                        @endif
                        @endforeach
                        <!-- Rate the student -->
                        @if($mark->total >= 400)
                        <td>
                            <div><hr style="width: 100%;border: 5px solid green;" /></div>
                        </td>
                        @elseif(($mark->total >= 370) && ($mark->total < 400))
                        <td>
                            <div><hr style="width: 100%;border: 5px solid blue;" /></div>
                        </td>
                        @elseif(($mark->total >= 340) && ($mark->total < 370))
                        <td>
                            <div><hr style="width: 100%;border: 5px solid rosybrown;" /></div>
                        </td>
                        @elseif(($mark->total >= 300) && ($mark->total < 370))
                        <td>
                            <div><hr style="width: 100%;border: 5px solid orange;" /></div>
                        </td>
                        @else
                        <td>
                            <div><hr style="width: 100%;border: 5px solid red;" /></div>
                        </td>
                        @endif
                        
                        <td class="table-left">{{ $mark->mathematics }} 
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Mathematics' ) && ($grade->from_mark <= $mark->mathematics) && ($grade->to_mark >= $mark->mathematics))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->english }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'English' ) && ($grade->from_mark <= $mark->english) && ($grade->to_mark >= $mark->english))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->kiswahili }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Kiswahili' ) && ($grade->from_mark <= $mark->kiswahili) && ($grade->to_mark >= $mark->kiswahili))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->chemistry ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Chemistry' ) && ($grade->from_mark <= $mark->chemistry) && ($grade->to_mark >= $mark->chemistry))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->biology ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Biology' ) && ($grade->from_mark <= $mark->biology) && ($grade->to_mark >= $mark->biology))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->physics ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Physics' ) && ($grade->from_mark <= $mark->physics) && ($grade->to_mark >= $mark->physics))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->cre ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'CRE' ) && ($grade->from_mark <= $mark->cre) && ($grade->to_mark >= $mark->cre))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->islam ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Islam' ) && ($grade->from_mark <= $mark->islam) && ($grade->to_mark >= $mark->islam))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->history ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'History' ) && ($grade->from_mark <= $mark->history) && ($grade->to_mark >= $mark->history))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->ghc ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'GHC' ) && ($grade->from_mark <= $mark->ghc) && ($grade->to_mark >= $mark->ghc))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>

                        <td class="table-left">{{ $mark->total }}</td>
                        <td class="table-left">{{ $mark->student_minscore }}
                        @if(!empty($generalGrades))
                            @foreach($generalGrades as $genGrade)
                            @if(($genGrade->from_mark <= round($mark->student_minscore,0)) && ($genGrade->to_mark >= round($mark->student_minscore,0)))
                            {{ $genGrade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        @if($mark->stream->stream_section->name === 'North')
                        <td class="table-left" style="color: red">{{ $mark->stream->stream_section->initials }}</td>
                        @elseif($mark->stream->stream_section->name === 'South')
                        <td class="table-left" style="color: orange">{{ $mark->stream->stream_section->initials }}</td>
                        @elseif($mark->stream->stream_section->name === 'West')
                        <td class="table-left" style="color: green">{{ $mark->stream->stream_section->initials }}</td>
                        @elseif($mark->stream->stream_section->name === 'East')
                        <td class="table-left" style="color: blue">{{ $mark->stream->stream_section->initials }}</td>
                        @endif
                        @if($passMark > $mark->total)
                        <td class="table-left"><span style="color: red">F</span></td>
                        @else
                        <td class="table-left"><span style="color: green">P</span></td>
                        @endif
                    @empty
                        <td class="table-left" colspan="10" style="color: red">
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
                            {{ round($maths->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Mathematics') && ($grade->from_mark <= $maths->avg()) && ($grade->to_mark >= $maths->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($english->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'English') && ($grade->from_mark <= $english->avg()) && ($grade->to_mark >= $english->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($kiswahili->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Kiswahili') && ($grade->from_mark <= $kiswahili->avg()) && ($grade->to_mark >= $kiswahili->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($chemistry->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Chemistry') && ($grade->from_mark <= $chemistry->avg()) && ($grade->to_mark >= $chemistry->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($biology->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Biology') && ($grade->from_mark <= $biology->avg()) && ($grade->to_mark >= $biology->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($physics->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Physics') && ($grade->from_mark <= $physics->avg()) && ($grade->to_mark >= $physics->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($cre->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'CRE') && ($grade->from_mark <= $cre->avg()) && ($grade->to_mark >= $cre->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($islam->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Islam') && ($grade->from_mark <= $islam->avg()) && ($grade->to_mark >= $islam->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($history->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'History') && ($grade->from_mark <= $history->avg()) && ($grade->to_mark >= $history->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10">
                            <b>
                            {{ round($ghc->avg(),0) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'GHC') && ($grade->from_mark <= $ghc->avg()) && ($grade->to_mark >= $ghc->avg()))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left padding-10"><b>{{ round($totals->avg(),0) }}</b></td>

                        <td class="table-left padding-10">
                            <b>
                                {{ round($classMinscore,1) }}
                                @if(!empty($generalGrades))
                                @foreach($generalGrades as $genGrade)
                                @if((round($classMinscore,0) >= $genGrade->from_mark) && (round($classMinscore,0) <= $genGrade->to_mark))
                                {{ $genGrade->grade }}
                                @endif
                                @endforeach
                                @endif
                            </b>
                        </td>
                        <td class="table-left padding-10"><b>#</b></td>
                        <td class="table-left padding-10"><b>#</b></td>
                    </tr>
                </tfoot>
            </table> 
            <div style="margin-left: 150px">
                <br/>
                <b><u>NB:</u></b>
                <ul>
                    @if(!is_null($passMark))
                    <li><span style="margin: 20px">PASS MARK: {{ $passMark }} MARKS</span></li>
                    <li><span style="color: green;margin: 20px">P</span>: PASS </li>
                    <li><span style="color: red;margin: 20px">F</span>: FAIL </li>
                    @else
                    <li><span style="margin: 20px">NO PASS MARK PROVIDED</span></li>
                    @endif
                </ul>
            </div>

            <div style="margin-bottom: 2cm;">
                <h4>{{ __('Summary')}}</h4>
                    <p>
                        {{ $class->students->count() }} Students sat for exam, i.e ({{ $males }} Males & {{ $females }} Females)
                    </p>
                    <p>Highest mark: {{ $totals->max() }}</p>
                    <p>Median mark: {{ $totals->median() }}</p>
                    <p>Lowest mark: {{ $totals->min() }}</p>

                    <h5>{{ __('Mathematics') }}</h5>
                    <p>Maths highest: {{ $maths->max() }}</p>
                    <p>Maths lowest: {{ $maths->min() }}</p>
                    <h5>{{ __('English') }}</h5>
                    <p>English highest: {{ $english->max() }}</p>
                    <p>English Lowest: {{ $english->min() }}</p>
                    <h5>{{ __('Kiswahili') }}</h5>
                    <p>Kiswahili highest: {{ $kiswahili->max() }}</p>
                    <p>Kiswahili lowest: {{ $kiswahili->min() }}</p>
                    <h5>{{ __('Chemistry') }}</h5>
                    <p>Chemistry highest: {{ $chemistry->max() }}</p>
                    <p>Chemistry lowest: {{ $chemistry->min() }}</p>
                    
                    <p>Certified by: {{ $mark->teacher->title }}. {{ $mark->teacher->full_name }}</p>
                </p>
                <div>{!! json_encode($totalMarksFrequencies) !!}</div>

                <h3 style="">STUDENTS GENDER GRAPH</h3>
                <canvas data-te-chart="bar" data-te-dataset-label="Overal Perfomance" data-te-labels="['Highest', 'Median','Lowest']" data-te-dataset-data="[{{ $totals->max() }}, {{ $totals->median() }}, $totals->min() }}]" data-te-dataset-background-color="['rgba(63, 81, 181, 0.5)', 'rgba(63, 81, 181, 0.5)', 'rgba(63, 81, 181, 0.5)']" data-te-dark-ticks-color="#ff0000" data-te-dark-grid-lines-color="#ffff00" data-te-dark-label-color="#ff00ff">
                </canvas>
            </div>
    </div>
</div>
@endsection
