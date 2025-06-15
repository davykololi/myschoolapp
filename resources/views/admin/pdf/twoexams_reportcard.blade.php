<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_report_head')
</head>
<body class="page-break">
    @include('partials.pdf_portrait_header')
    @include('partials.pdf_reportcard_footer')
    <div class="container" style="margin-top: 1cm;">
        <div class="row">
            <div class="col-md-12">
                <div style="margin-top: 45px"><x-pdf-portrait-current-date/></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="title"><u>{{$title}}</u></h2>
                        <p style="font-size: 20px;margin-bottom: 12px;text-transform: uppercase;">
                            <u>{{$year->year}} {{$term->name}}</u>
                        </p>
                    </div>
                    <div style="width: 100%;text-transform: uppercase;margin-left: -5px;">
                        <span style="float: left;"><b>Name: </b><span class="dotted-underline">{{ $markName }}</span></span>
                        <span style="float: right;margin-right: 15px;"><b>Class:</b> 
                            <span class="dotted-underline">{{$stream->name}}</span>
                        </span>
                    </div>
                    <div class="report-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="table-left"><b>SUBJECTS</b></th>
                                <th class="table-left"><b style="text-transform: uppercase;">{{ $examOneMark->exam->initials }}</b></th>
                                <th class="table-left"><b style="text-transform: uppercase;">{{ $examTwoMark->exam->initials }}</b></th>
                                <th class="table-left"><b>MEAN</b></th>
                                <th class="table-left"><b>REMARK</b></th>
                                <th class="table-left"><b>TEACHER</b></th>
                            </tr>
                        </thead>
                        @if(!empty($streamStudents))
                        @foreach($streamStudents as $st)
                        @if((strtolower($st->user->full_name) === $name) && ($st->stream->id === $stream->id) && ($st->admission_no === $mark->admission_no))
                        <tbody>
                            <tr>
                                <td class="table-left"><b>MATHEMATICS</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->mathematics ?? '-' }}
                                    @if(!is_null($examOneMathsGrade)){{ $examOneMathsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->mathematics ?? '-' }}
                                    @if(!is_null($examTwoMathsGrade)){{ $examTwoMathsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($mathsAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'Mathematics') && ($grade->from_mark <= round($mathsAvg,0)) && ($grade->to_mark >= round($mathsAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($mathsSubjectRemarks)){{ $mathsSubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamMathematicsTeacher)){{ $streamMathematicsTeacher }}@endif
                                </td>
                            </tr>
                            <tr>
                                <td class="table-left"><b>ENGLISH</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->english ?? '-' }}
                                    @if(!is_null($examOneEnglishGrade)){{ $examOneEnglishGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->english ?? '-' }}
                                    @if(!is_null($examTwoEnglishGrade)){{ $examTwoEnglishGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($engAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'English') && ($grade->from_mark <= round($engAvg,0)) && ($grade->to_mark >= round($engAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($englishSubjectRemarks)){{ $englishSubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamEnglishTeacher)){{ $streamEnglishTeacher }}@endif
                                </td>
                            </tr>
                            <tr>
                                <td class="table-left"><b>KISWAHILI</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->kiswahili ?? '-' }}
                                    @if(!is_null($examOneKiswGrade)){{ $examOneKiswGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->kiswahili ?? '-' }}
                                    @if(!is_null($examTwoKiswGrade)){{ $examTwoKiswGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($kiswAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'Kiswahili') && ($grade->from_mark <= round($kiswAvg,0)) && ($grade->to_mark >= round($kiswAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($kiswahiliSubjectRemarks)){{ $kiswahiliSubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamKiswahiliTeacher)){{ $streamKiswahiliTeacher }}@endif
                                </td>
                            </tr>

                            @if(!is_null($examOneMark->chemistry) || !is_null($examTwoMark->chemistry))
                            <tr>
                                <td class="table-left"><b>CHEMISTRY</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->chemistry ?? '-' }}
                                    @if(!is_null($examOneChemGrade)){{ $examOneChemGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->chemistry ?? '-' }}
                                    @if(!is_null($examTwoChemGrade)){{ $examTwoChemGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($chemAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'Chemistry') && ($grade->from_mark <= round($chemAvg,0)) && ($grade->to_mark >= round($chemAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($chemistrySubjectRemarks)){{ $chemistrySubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamChemistryTeacher)){{ $streamChemistryTeacher }}@endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->biology) || !is_null($examTwoMark->biology))
                            <tr>
                                <td class="table-left"><b>BIOLOGY</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->biology ?? '-' }}
                                    @if(!is_null($examOneBioGrade)){{ $examOneBioGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->biology ?? '-' }}
                                    @if(!is_null($examTwoBioGrade)){{ $examTwoBioGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($bioAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'Biology') && ($grade->from_mark <= round($bioAvg,0)) && ($grade->to_mark >= round($bioAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($biologySubjectRemarks)){{ $biologySubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamBiologyTeacher)){{ $streamBiologyTeacher }}@endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->physics) || !is_null($examTwoMark->physics))
                            <tr>
                                <td class="table-left"><b>PHYSICS</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->physics ?? '-' }}
                                    @if(!is_null($examOnePhysicsGrade)){{ $examOnePhysicsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->physics ?? '-' }}
                                    @if(!is_null($examTwoPhysicsGrade)){{ $examTwoPhysicsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($physicsAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'Physics') && ($grade->from_mark <= round($physicsAvg,0)) && ($grade->to_mark >= round($physicsAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($physicsSubjectRemarks)){{ $physicsSubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamPhysicsTeacher)){{ $streamPhysicsTeacher }}@endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->cre) || !is_null($examTwoMark->cre))
                            <tr>
                                <td class="table-left"><b>CRE</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->cre ?? '-' }}
                                    @if(!is_null($examOneCREGrade)){{ $examOneCREGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->cre ?? '-' }}
                                    @if(!is_null($examTwoCREGrade)){{ $examTwoCREGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($creAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'CRE') && ($grade->from_mark <= round($creAvg,0)) && ($grade->to_mark >= round($creAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($creSubjectRemarks)){{ $creSubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamCRETeacher)){{ $streamCRETeacher }}@endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->islam) || !is_null($examTwoMark->islam))
                            <tr>
                                <td class="table-left"><b>ISLAM</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->islam ?? '-' }}
                                    @if(!is_null($examOneIslamGrade)){{ $examOneIslamGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->islam ?? '-' }}
                                    @if(!is_null($examTwoIslamGrade)){{ $examTwoIslamGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($islamAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'Islam') && ($grade->from_mark <= round($islamAvg,0)) && ($grade->to_mark >= round($islamAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($islamSubjectRemarks)){{ $islamSubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamIslamTeacher)){{ $streamIslamTeacher }}@endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->history_and_government) || !is_null($examTwoMark->history_and_government))
                            <tr>
                                <td class="table-left"><b>HISTORY</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->history_and_government ?? '-' }}
                                    @if(!is_null($examOneHistoryAndGovernmentGrade)){{ $examOneHistoryAndGovernmentGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->history ?? '-' }}
                                    @if(!is_null($examTwoHistoryAndGovernmentGrade)){{ $examTwoHistoryAndGovernmentGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($histAndGovernmentAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'History And Government') && ($grade->from_mark <= round($histAndGovernmentAvg,0)) && ($grade->to_mark >= round($histAndGovernmentAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($historyAndGovernmentSubjectRemarks)){{ $historyAndGovernmentSubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamHistoryAndGovernmentTeacher)){{ $streamHistoryAndGovernmentTeacher }}@endif
                                </td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->geography) || !is_null($examTwoMark->geography))
                            <tr>
                                <td class="table-left"><b>GEOGRAPHY</b></td>
                                <td class="table-left">
                                    {{ $examOneMark->geography ?? '-' }}
                                    @if(!is_null($examOneGeographyGrade)){{ $examOneGeographyGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->geography ?? '-' }}
                                    @if(!is_null($examTwoGeographyGrade)){{ $examTwoGeographyGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ round($geogAvg,1) ? : null ?? '-' }}
                                    @if(!empty($reportSubjectGrades))
                                    @foreach($reportSubjectGrades as $grade)
                                    @if(($grade->subject->name === 'Geography') && ($grade->from_mark <= round($geogAvg,0)) && ($grade->to_mark >= round($geogAvg,0)))
                                    {{ $grade->grade }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td class="table-left">
                                    @if(!is_null($geographySubjectRemarks)){{ $geographySubjectRemarks }}@endif
                                </td>
                                <td class="table-left" style="font-size: 16px;">
                                    @if(!is_null($streamGeographyTeacher)){{ $streamGeographyTeacher }}@endif
                                </td>
                            </tr>
                            @else
                            @endif 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="table-left"><b>MEAN SCORES</b></td>
                                <td class="table-left">
                                    <b>
                                        {{ $examOneTotal/$subjectsTakenPerStream }} @if(!is_null($examOneGenGrade)) {{ $examOneGenGrade }} @endif
                                    </b>    
                                </td>
                                <td class="table-left">
                                    <b>
                                        {{ $examTwoTotal/$subjectsTakenPerStream }} @if(!is_null($examTwoGenGrade)) {{ $examTwoGenGrade }} @endif
                                    </b>    
                                </td>
                                <td class="table-left">
                                    <b>
                                        {{ round($overalTotalAvg/$subjectsTakenPerStream,1) }}
                                        @if(!empty($reportMeanGrades))
                                        @foreach($reportMeanGrades as $meanGrade)
                                        @if(($meanGrade->from_mark <= round($overalTotalAvg/$subjectsTakenPerStream,0)) && ($meanGrade->to_mark >= round($overalTotalAvg/$subjectsTakenPerStream,0)))
                                        {{ $meanGrade->grade }}
                                        @endif
                                        @endforeach
                                        @endif
                                    </b>
                                </td>
                                <td class="table-left"><b>#</b></td>
                                <td class="table-left"><b>#</b></td>
                            </tr>
                            <tr>
                                <td class="table-left"><b>TOTAL MARKS</b></td>
                                <td class="table-left"></td>
                                <td class="table-left"></td>
                                <td class="table-left"><b>{{ round($overalTotalAvg,0) }}/{{ $outOfMarksConstant }}</b></td>
                                <td class="table-left"><b>#</b></td>
                                <td class="table-left"><b>#</b></td>
                            </tr>
                            <tr>
                                <td class="table-left"><b>GPA</b></td>
                                <td class="table-left"></td>
                                <td class="table-left"></td>
                                <td class="table-left"><b>{{ $overalGPA }} PTS</b></td>
                                <td class="table-left"><b>#</b></td>
                                <td class="table-left"><b>#</b></td>
                            </tr> 
                        </tfoot>
                        @endif
                        @endforeach
                        @endif
                    </table>
                    </div>
                    <div style="margin-top:15px">
                        <span colspan="2" width="50%" style="text-align: left;"><b>Overal Position:</b> 
                            @if(!is_null($overalPosition ))
                            <span style="margin-right: 400px;" class="dotted-underline">
                                {{ $overalPosition }}/{{ $stream->class->students->count() }}
                            </span>
                            @else
                            <b>{{ __('______') }}</b>
                            @endif   
                        </span>
                        <span colspan="2" width="50%" style="float: right;margin-right: 20px"><b>Stream Position:</b>
                            @if(!is_null($streamPosition))
                            <span class="dotted-underline">{{ $streamPosition }}/{{ $stream->students->count() }}</span>
                            @else
                            <b>{{ __('______') }}</b>
                            @endif
                        </span>
                    </div>
                    <div><p><b>General Remark:</b> <i class="dotted-underline">{{ $reportGeneralRemark }}.</i></p></div>
                    <div class="col-lg-12" style="margin-top: -15px;">
                        <p style="width: 100%;line-height: 0.5cm;line-height: 0.7cm;">
                            <b>Individual Remark(s):</b> ...........................................................................................................................
                            ..................................................................................................................................................................
                            ..................................................................................................................................................................
                            ..................................................................................................................................................................
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <p style="width: 100%;line-height: 0.5cm;line-height: 0.7cm;">
                            <b>Recommendation:</b> ..................................................................................................................................
                            ..................................................................................................................................................................
                            ..................................................................................................................................................................
                            ..................................................................................................................................................................
                        </p>
                    </div>
                    <div style="width: 100%;margin-top: 100px">
                        <p>
                            <span style="margin-right: 340px">Signature ....................................</span>
                            <span>Signature ......................................</span>
                        </p>
                        <p style="margin-top:-20px">
                            <b style="margin-right: 470px">THE PRINCIPAL</b>
                            <b>CLASS TEACHER</b>
                        </p>
                    </div>
                        <div style="font-size: 20px;">
                            <span>
                                <b>CLOSING DATE:</b> <i>{{ $closingDate }}</i>
                            </span>
                            <span style="margin-left:384px">
                                <b>OPENING DATE:</b> <i>{{ $openingDate }}</i>
                            </span>
                        </div>
                        <p style="font-size: 20px;margin-top: 1cm;">
                            <i> 
                                <b>NB:</b> <span class="mnb">All students are supposed to report back to school before <b>5.00pm</b> on {{ $openingDate }}. This should be adhered to strictly.</span>
                            </i>
                        </p>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
