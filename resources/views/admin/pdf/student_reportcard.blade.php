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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="title">
                            <u style="font-family: impact">{{$title}}</u>
                        </h2>
                        <p style="font-size: 20px;margin-bottom: 12px;text-transform: uppercase;">
                            <u>{{$year->year}} {{$term->name}}</u>
                        </p>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <span style="text-align: left;text-transform: uppercase;"><b>Name: </b><i>{{ $name }}</i></span>
                        <span style="text-align: right;text-transform: uppercase;"><b style="margin-left: 200px;">Class:</b> {{$stream->name}}</span>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="bgcolor-grey"><b>SUBJECTS</b></th>
                                <th class="bgcolor-grey"><b style="text-transform: uppercase;">{{ $examOneMark->exam->name }}</b></th>
                                <th class="bgcolor-grey"><b style="text-transform: uppercase;">{{ $examTwoMark->exam->name }}</b></th>
                                <th class="bgcolor-grey"><b style="text-transform: uppercase;">{{ $examThreeMark->exam->name }}</b></th>
                                <th class="bgcolor-grey"><b>AVERAGE</b></th>
                            </tr>
                        </thead>
                        @if(!empty($streamStudents))
                            @foreach($streamStudents as $st)
                                @if((strtolower($st->full_name) === $name) && ($st->stream->id === $stream->id) && ($st->admission_no === $mark->admission_no))
                        <tbody>
                            <tr>
                                <th class="table-left"><b>MATHEMATICS</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->mathematics ?? '-' }}
                                    @if(!is_null($examOneMathsGrade)){{ $examOneMathsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->mathematics ?? '-' }}
                                    @if(!is_null($examTwoMathsGrade)){{ $examTwoMathsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->mathematics ?? '-' }}
                                    @if(!is_null($examThreeMathsGrade)){{ $examThreeMathsGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($mathsAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>ENGLISH</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->english ?? '-' }}
                                    @if(!is_null($examOneEnglishGrade)){{ $examOneEnglishGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->english ?? '-' }}
                                    @if(!is_null($examTwoEnglishGrade)){{ $examTwoEnglishGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->english ?? '-' }}
                                    @if(!is_null($examThreeEnglishGrade)){{ $examThreeEnglishGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($engAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>KISWAHILI</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->kiswahili ?? '-' }}
                                    @if(!is_null($examOneKiswGrade)){{ $examOneKiswGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->kiswahili ?? '-' }}
                                    @if(!is_null($examTwoKiswGrade)){{ $examTwoKiswGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->kiswahili ?? '-' }}
                                    @if(!is_null($examThreeKiswGrade)){{ $examThreeKiswGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($kiswAvg,1) ? : null ?? '-' }}</td>
                            </tr>

                            @if(!is_null(($examOneMark->chemistry) || !is_null($examTwoMark->chemistry) || !is_null($examThreeMark->chemistry) ))
                            <tr>
                                <th class="table-left"><b>CHEMISTRY</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->chemistry ?? '-' }}
                                    @if(!is_null($examOneChemGrade)){{ $examOneChemGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->chemistry ?? '-' }}
                                    @if(!is_null($examTwoChemGrade)){{ $examTwoChemGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->chemistry ?? '-' }}
                                    @if(!is_null($examThreeChemGrade)){{ $examThreeChemGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($chemAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->biology) || !is_null($examTwoMark->biology) || !is_null($examThreeMark->biology))
                            <tr>
                                <th class="table-left"><b>BIOLOGY</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->biology ?? '-' }}
                                    @if(!is_null($examOneBioGrade)){{ $examOneBioGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->biology ?? '-' }}
                                    @if(!is_null($examTwoBioGrade)){{ $examTwoBioGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->biology ?? '-' }}
                                    @if(!is_null($examThreeBioGrade)){{ $examThreeBioGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($bioAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->physics) || !is_null($examTwoMark->physics) || !is_null($examThreeMark->physics))
                            <tr>
                                <th class="table-left"><b>PHYSICS</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->physics ?? '-' }}
                                    @if(!is_null($examOnePhysicsGrade)){{ $examOnePhysicsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->physics ?? '-' }}
                                    @if(!is_null($examTwoPhysicsGrade)){{ $examTwoPhysicsGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->physics ?? '-' }}
                                    @if(!is_null($examThreePhysicsGrade)){{ $examThreePhysicsGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($physicsAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->cre) || !is_null($examTwoMark->cre) || !is_null($examThreeMark->cre))
                            <tr>
                                <th class="table-left"><b>CRE</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->cre ?? '-' }}
                                    @if(!is_null($examOneCREGrade)){{ $examOneCREGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->cre ?? '-' }}
                                    @if(!is_null($examTwoCREGrade)){{ $examTwoCREGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->cre ?? '-' }}
                                    @if(!is_null($examThreeCREGrade)){{ $examThreeCREGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($creAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->islam) || !is_null($examTwoMark->islam) || !is_null($examThreeMark->islam))
                            <tr>
                                <th class="table-left"><b>ISLAM</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->islam ?? '-' }}
                                    @if(!is_null($examOneIslamGrade)){{ $examOneIslamGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->islam ?? '-' }}
                                    @if(!is_null($examTwoIslamGrade)){{ $examTwoIslamGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->islam ?? '-' }}
                                    @if(!is_null($examThreeIslamGrade)){{ $examThreeIslamGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($islamAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->history) || !is_null($examTwoMark->history) || !is_null($examThreeMark->history))
                            <tr>
                                <th class="table-left"><b>HISTORY</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->history ?? '-' }}
                                    @if(!is_null($examOneHistGrade)){{ $examOneHistGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->history ?? '-' }}
                                    @if(!is_null($examTwoHistGrade)){{ $examTwoHistGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->history ?? '-' }}
                                    @if(!is_null($examThreeHistGrade)){{ $examThreeHistGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($histAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            @else
                            @endif

                            @if(!is_null($examOneMark->ghc) || !is_null($examTwoMark->ghc)  || !is_null($examThreeMark->ghc))
                            <tr>
                                <th class="table-left"><b>GHC</b></th>
                                <td class="table-left">
                                    {{ $examOneMark->ghc ?? '-' }}
                                    @if(!is_null($examOneGHCGrade)){{ $examOneGHCGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examTwoMark->ghc ?? '-' }}
                                    @if(!is_null($examTwoGHCGrade)){{ $examTwoGHCGrade }}@endif
                                </td>
                                <td class="table-left">
                                    {{ $examThreeMark->ghc ?? '-' }}
                                    @if(!is_null($examThreeGHCGrade)){{ $examThreeGHCGrade }}@endif
                                </td>
                                <td class="table-left">{{ round($ghcAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            @else
                            @endif 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="table-left"><b>MEAN SCORES</b></th>
                                <td class="table-left">
                                    <b>
                                        {{ $examOneTotal/5 }} @if(!is_null($examOneGenGrade)) {{ $examOneGenGrade }} @endif
                                    </b>    
                                </td>
                                <td class="table-left">
                                    <b>
                                        {{ $examTwoTotal/5 }} @if(!is_null($examTwoGenGrade)) {{ $examTwoGenGrade }} @endif
                                    </b>
                                    
                                        
                                </td>
                                <td class="table-left">
                                    <b>
                                        {{ $examThreeTotal/5 }} @if(!is_null($examThreeGenGrade)) {{ $examThreeGenGrade }} @endif
                                    </b>
                                </td>
                                <td class="table-left">
                                    <b>{{ round($overalTotalAvg/5,1) }}</b>
                                </td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>TOTAL MARKS</b></th>
                                <td class="table-left"></td>
                                <td class="table-left"></td>
                                <td class="table-left"></td>
                                <td class="table-left"><b>{{ round($overalTotalAvg,0) }}</b></td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>GPA</b></th>
                                <td class="table-left"></td>
                                <td class="table-left"></td>
                                <td class="table-left"></td>
                                <td class="table-left"><b>{{ $overalGPA }}</b></td>
                            </tr> 
                        </tfoot>
                                @endif
                            @endforeach
                        @endif
                    </table>
                    <div style="margin-top:15px">
                        <span colspan="2" width="50%" style="text-align: left;"><b>POSITIONS:</b> OVERAL 
                            @if(!is_null($overalPosition ))
                            <b>{{ $overalPosition }}/{{ $stream->class->students->count() }}</b>
                            @else
                            <b>{{ __('-') }}</b>
                            @endif   
                        </span>
                        <span colspan="2" width="50%" style="margin-left: 500px;">STREAM
                            @if(!is_null($streamPosition))
                            <b>{{ $streamPosition }}/{{ $stream->students->count() }}</b>
                            @else
                            <b>{{ __('-') }}</b>
                            @endif
                        </span>
                    </div>
                    <div><p>General Comment: <i>{{ $reportCardComment }}.</i></p></div>
                    <div class="col-lg-12">
                        <p style="width: 100%;line-height: 0.5cm;line-height: 0.7cm;">
                            <b>Recommendation:</b> ..................................................................................................................................
                            ..................................................................................................................................................................
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
                                <b>NB:</b> All students are supposed to report back to school before <b>5.00pm</b> on {{ $openingDate }}. This should be adhered to strictly.
                            </i>
                        </p>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
