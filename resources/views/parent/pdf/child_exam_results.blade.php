<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.student_pdf_results_head')
</head>
<body class="page-break">
    @include('partials.pdf_portrait_header')
    @include('partials.student_pdf_results_footer')
    <br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="margin-top: 40px; margin-bottom: -50px;margin-right: 5px;">
                            <x-pdf-portrait-current-date/>
                        </div>
                        <h2 class="title">
                            <u>{{$title}}</u>
                        </h2>
                    </div>
                    <div style="width: 100%;text-transform: uppercase;margin-left: -5px;">
                        <span style="float: left;"><b>Name: </b><span class="dotted-underline"><i>{{ $markName }}</i></span></span>
                        <span style="float: right;margin-right: 15px;"><b>Class:</b> <span class="dotted-underline">{{$stream->name}}</span></span>
                    </div>
                    <div style="margin-top: 40px;">
                    <table>
                        <thead>
                            <tr>
                                <th class="table-left"><b>{{ __('SUBJECTS') }}</b></th>
                                <th class="table-left"><b>{{ __('MARKS') }}</b></th>
                            </tr>
                        </thead>
                        @if(!empty($marks))
                        @foreach($marks as $mark)
                        @if(($mark->name === $markName) && ($mark->stream->id === $stream->id) && ($mark->term->id === $term->id) && ($mark->exam->id === $exam->id) && ($mark->year->id === $year->id))
                        <tbody>
                            @if(!is_null($mark->mathematics))
                            <tr>
                                <th class="table-left">MATHEMATICS</th>
                                <td class="table-left">
                                    {{ $mark->mathematics ?? '-' }}
                                    @if(!empty($examGrades))
                                    @foreach($examGrades as $grade)
                                    @if(($grade->subject->name === 'Mathematics' ) && ($grade->from_mark <= $mark->mathematics) && ($grade->to_mark >= $mark->mathematics))
                                        {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->english))
                            <tr>
                                <th class="table-left">ENGLISH</th>
                                <td class="table-left">
                                    {{ $mark->english ?? '-' }}
                                    @if(!empty($examGrades))
                                    @foreach($examGrades as $grade)
                                    @if(($grade->subject->name === 'English' ) && ($grade->from_mark <= $mark->english) && ($grade->to_mark >= $mark->english))
                                        {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->kiswahili))
                            <tr>
                                <th class="table-left">KISWAHILI</th>
                                <td class="table-left">
                                    {{ $mark->kiswahili ?? '-' }}
                                    @if(!empty($examGrades))
                                    @foreach($examGrades as $grade)
                                    @if(($grade->subject->name === 'Kiswahili' ) && ($grade->from_mark <= $mark->kiswahili) && ($grade->to_mark >= $mark->kiswahili))
                                        {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->chemistry))
                            <tr>
                                <th class="table-left">CHEMISTRY</th>
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
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->biology))
                            <tr>
                                <th class="table-left">BIOLOGY</th>
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
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->physics))
                            <tr>
                                <th class="table-left">PHYSICS</th>
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
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->cre))
                            <tr>
                                <th class="table-left">CRE</th>
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
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->islam))
                            <tr>
                                <th class="table-left">ISLAM</th>
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
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->history))
                            <tr>
                                <th class="table-left">HISTORY</th>
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
                            </tr>
                            @else
                            @endif

                            @if(!is_null($mark->geography))
                            <tr>
                                <th class="table-left">GEOGRAPHY</th>
                                <td class="table-left">
                                    {{ $mark->geography ?? '-' }}
                                    @if(!empty($examGrades))
                                    @foreach($examGrades as $grade)
                                    @if(($grade->subject->name === 'Geography' ) && ($grade->from_mark <= $mark->geography) && ($grade->to_mark >= $mark->geography))
                                        {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
                            @else
                            @endif 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="table-left"><b>TOTAL MARKS</b></th>
                                <td class="table-left"><b>{{ round($mark->total,1) }}/500</b></td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>MEAN SCORE</b></th>
                                <td class="table-left">
                                    <b>
                                        {{ $mark->student_minscore }}
                                        @if(!empty($generalGrades))
                                        @foreach($generalGrades as $genGrade)
                                        @if(($genGrade->from_mark <= round($mark->student_minscore,0)) && ($genGrade->to_mark >= round($mark->student_minscore,0)))
                                            {{ $genGrade->grade }}
                                        @endif
                                        @endforeach
                                        @endif  
                                    </b>    
                                </td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>POSITION</b></th>
                                @foreach($rankings as $name=>$pos)
                                @if($name === $mark->name && $pos['score'] === $mark->total)
                                <td class="table-left">
                                    {{ $pos['rank'] }}/{{ $class->students->count() }}
                                </td>
                                @endif
                                @endforeach
                            </tr>
                        </tfoot>
                        @endif
                        @endforeach
                        @endif
                    </table> 
                    </div>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>
