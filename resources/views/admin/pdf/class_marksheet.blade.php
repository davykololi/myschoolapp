@extends('layouts.pdf_landscape_marksheet')

@section('title')
    {{ $class->school->name }}
@endsection

@section('content')
<div class="container-fluid box"> 
    <x-pdf-landscape2-current-date/>
    <div><h2 class="title"><u>{{$title}}</u></h2></div> 
    <div>
           <table>
                <thead>
                    <tr>
                        <td class="table-left padding-10"><b>NO</b></td>
                        <td class="table-left padding-10"><b>NAME</b></td>
                        <td class="table-left padding-10"><b>GDR</b></td>
                        <td class="table-left padding-10"><b>STATUS</b></td>
                        <td class="table-left padding-10"><b>RATE</b></td>
                        @if(!is_null($maths))
                        <td class="table-left padding-10"><b>MTHS</b></td>
                        @else
                        @endif

                        @if(!is_null($english))
                        <td class="table-left padding-10"><b>ENG</b></td>
                        @else
                        @endif
                        
                        <td class="table-left padding-10"><b>KIS</b></td>
                        <td class="table-left padding-10"><b>CHEM</b></td>
                        <td class="table-left padding-10"><b>BIO</b></td>
                        <td class="table-left padding-10"><b>PHY</b></td>
                        <td class="table-left padding-10"><b>CRE</b></td>
                        <td class="table-left padding-10"><b>ISLM</b></td>

                        @if(!is_null($historyAndGovernment))
                        <td class="table-left padding-10"><b>H&G</b></td>
                        @else
                        @endif

                        @if(!is_null($geography))
                        <td class="table-left padding-10"><b>GEOG</b></td>
                        @else
                        @endif

                        @if(!is_null($artAndDesign))
                        <td class="table-left padding-10"><b>A&D</b></td>
                        @else
                        @endif

                        @if(!is_null($agriculture))
                        <td class="table-left padding-10"><b>AGR</b></td>
                        @else
                        @endif

                        @if(!is_null($businessStudies))
                        <td class="table-left padding-10"><b>BST</b></td>
                        @else
                        @endif

                        @if(!is_null($computerStudies))
                        <td class="table-left padding-10"><b>CST</b></td>
                        @else
                        @endif

                        @if(!is_null($french))
                        <td class="table-left padding-10"><b>FR</b></td>
                        @else
                        @endif

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
                        <td class="table-left">{{ $mark->name }}</td>
                        
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
                        <td style="background-color: green;"></td>
                        @elseif(($mark->total >= 370) && ($mark->total < 400))
                        <td style="background-color: blue;"></td>
                        @elseif(($mark->total >= 340) && ($mark->total < 370))
                        <td style="background-color: rosybrown;"></td>
                        @elseif(($mark->total >= 300) && ($mark->total < 370))
                        <td style="background-color: orangered;"></td>
                        @else
                        <td style="background-color: red;"></td>
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
                        <td class="table-left">{{ $mark->history_and_government ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'History And Government' ) && ($grade->from_mark <= $mark->history_and_government) && ($grade->to_mark >= $mark->history_and_government))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->geography ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Geography' ) && ($grade->from_mark <= $mark->geography) && ($grade->to_mark >= $mark->geography))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->art_and_design ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Art And Design' ) && ($grade->from_mark <= $mark->art_and_design) && ($grade->to_mark >= $mark->art_and_design))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->agriculture ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Agriculture' ) && ($grade->from_mark <= $mark->agriculture) && ($grade->to_mark >= $mark->agriculture))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->business_studies ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Business Studies' ) && ($grade->from_mark <= $mark->business_studies) && ($grade->to_mark >= $mark->business_studies))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->computer_studies ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Computer Studies' ) && ($grade->from_mark <= $mark->computer_studies) && ($grade->to_mark >= $mark->computer_studies))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                        @endif
                        </td>
                        <td class="table-left">{{ $mark->french ?? '-' }}
                        @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'French' ) && ($grade->from_mark <= $mark->french) && ($grade->to_mark >= $mark->french))
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
                    <tr style="border-top: 5px solid black;">
                        <td class="table-left"><b>#</b></td>
                        <td class="table-left"><b>MEAN SCORES</b></td>
                        <td class="table-left"><b>#</b></td>
                        <td class="table-left"><b>#</b></td>
                        <td class="table-left"><b>#</b></td>
                        <td class="table-left">
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
                        <td class="table-left">
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
                        <td class="table-left">
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
                        <td class="table-left">
                            <b>
                            {{ round($chemistry->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Chemistry') && ($grade->from_mark <= round($chemistry->avg(),0)) && ($grade->to_mark >= round($chemistry->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($biology->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Biology') && ($grade->from_mark <= round($biology->avg(),0)) && ($grade->to_mark >= round($biology->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($physics->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Physics') && ($grade->from_mark <= round($physics->avg(),0)) && ($grade->to_mark >= round($physics->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($cre->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'CRE') && ($grade->from_mark <= round($cre->avg(),0)) && ($grade->to_mark >= round($cre->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($islam->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Islam') && ($grade->from_mark <= round($islam->avg(),0)) && ($grade->to_mark >= round($islam->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($historyAndGovernment->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'History And Government') && ($grade->from_mark <= round($historyAndGovernment->avg(),0)) && ($grade->to_mark >= round($historyAndGovernment->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($geography->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Geography') && ($grade->from_mark <= round($geography->avg(),0)) && ($grade->to_mark >= round($geography->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($artAndDesign->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Art And Design') && ($grade->from_mark <= round($artAndDesign->avg(),0)) && ($grade->to_mark >= round($artAndDesign->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($agriculture->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Agriculture') && ($grade->from_mark <= round($agriculture->avg(),0)) && ($grade->to_mark >= round($agriculture->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($businessStudies->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Business Studies') && ($grade->from_mark <= round($businessStudies->avg(),0)) && ($grade->to_mark >= round($businessStudies->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($computerStudies->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'Computer Studies') && ($grade->from_mark <= round($computerStudies->avg(),0)) && ($grade->to_mark >= round($computerStudies->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left">
                            <b>
                            {{ round($french->avg(),1) }}
                            @if(!empty($examGrades))
                            @foreach($examGrades as $grade)
                            @if(($grade->subject->name === 'French') && ($grade->from_mark <= round($french->avg(),0)) && ($grade->to_mark >= round($french->avg(),0)))
                            {{ $grade->grade }}
                            @endif
                            @endforeach
                            @endif
                            </b>
                        </td>
                        <td class="table-left"><b>{{ round($totals->avg(),0) }}</b></td>
                        <td class="table-left">
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
                        <td class="table-left"><b>#</b></td>
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
                    <li><span style="color: green;margin: 20px">ST.MEAN</span>: STUDENT MEAN SCORE </li>
                    <li><span style="color: red;margin: 20px">F</span>: FAIL </li>
                    @else
                    <li><span style="margin: 20px">NO PASS MARK PROVIDED</span></li>
                    @endif
                </ul>
            </div>

            <div style="margin-bottom: 2cm;">
                <h4>{{ __('Summary')}}</h4>
                    <p>
                        {{ $class->students->count() }} {{ $class->name }} Students sat for {{ $exam->name }}. That's ({{ $males }} Males & {{ $females }} Females).
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
                    
                    <p>Certified by: {{ $mark->teacher->user->salutation }}. {{ $mark->teacher->user->full_name }}</p>
                </p>
                <div>{!! json_encode($totalMarksFrequencies) !!}</div>
                <div id="chartDiv" class="pie-chart"></div>


                <div class="text-black">
                    <span class="container relative" style="position: relative; width: 500px; height:300px;">
                        <img src="data:image/png;base64,{!! base64_encode($subjectsMiniscoresChart->container()) !!}"/>
                    </span>
                </div>

                <script src="{{ $subjectsMiniscoresChart->cdn() }}"></script>
                {{ $subjectsMiniscoresChart->script() }}

            </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="https://www.google.com/jsapi"></script>   
<script type="text/javascript">
    window.onload = function() {
        google.load("visualization", "1.1", {
            packages: ["corechart"],
            callback: 'drawChart'
        });
    };
   
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Pizza');
        data.addColumn('number', 'Populartiy');
        data.addRows([
            ['Mathematics', {{ $maths->avg() }}],
            ['English', {{ $english->avg() }}],
            ['Kiswahili', {{ $kiswahili->avg() }}],
            ['Chemistry', {{ $chemistry->avg() }}],
            ['Biology', {{ $biology->avg() }}],
            ['Physics', {{ $physics->avg() }}],
            ['CRE', {{ $cre->avg() }}],
            ['Islam', {{ $islam->avg() }}],
            ['Geography', {{ $geography->avg() }}],
            ['History', {{ $historyAndGovernment->avg() }}]
        ]);
   
        var options = {
            title: 'Subjects Mean Scores',
            sliceVisibilityThreshold: .2
        };
   
        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }
</script>
