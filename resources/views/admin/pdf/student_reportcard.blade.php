<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	@include('partials.pdf_report_head')
<body>
    @include('partials.pdf_header')
    @include('partials.pdf_school_footer')  
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="title">
                            <u>{{$year->year}} {{$term->name}} {{$title}}</u>
                        </h2>
                        <br/>
                    </div>
                    <br/>
                    <table class="table table-bordered">
                        <caption>
                            <p class="left"><b>Name: </b><i>{{$mark->name}}</i></p>
                            <p class="right"><b>Class: </b>{{$mark->stream->name}}</p>
                        </caption>
                        <thead>
                            <tr>
                                <th class="bgcolor-grey"><b>SUBJECTS</b></th>
                                <th class="bgcolor-grey"><b>EX1:MARKS</b></th>
                                <th class="bgcolor-grey"><b>EX2:MARKS</b></th>
                                <th class="bgcolor-grey"><b>EX3:MARKS</b></th>
                                <th class="bgcolor-grey"><b>AVERAGE</b></th>
                            </tr>
                        </thead>
                        @if(!empty($stream->students))
                            @foreach($stream->students as $st)
                                @if($student->name === $st->name && $student->standard_subjects === $st->standard_subjects)
                        <tbody>
                            <tr>
                                <th class="table-left"><b>MATHEMATICS</b></th>
                                <td class="table-center">{{ $examOneMark->mathematics ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->mathematics ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->mathematics ?? '-' }}</td>
                                <td class="table-center">{{ round($mathsAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>ENGLISH</b></th>
                                <td class="table-center">{{ $examOneMark->english ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->english ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->english ?? '-' }}</td>
                                <td class="table-center">{{ round($engAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>KISWAHILI</b></th>
                                <td class="table-center">{{ $examOneMark->kiswahili ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->kiswahili ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->kiswahili ?? '-' }}</td>
                                <td class="table-center">{{ round($kiswAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>CHEMISTRY</b></th>
                                <td class="table-center">{{ $examOneMark->chemistry ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->chemistry ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->chemistry ?? '-' }}</td>
                                <td class="table-center">{{ round($chemAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>BIOLOGY</b></th>
                                <td class="table-center">{{ $examOneMark->biology ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->biology ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->biology ?? '-' }}</td>
                                <td class="table-center">{{ round($bioAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>PHYSICS</b></th>
                                <td class="table-center">{{ $examOneMark->physics ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->physics ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->physics ?? '-' }}</td>
                                <td class="table-center">{{ round($physicsAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>CRE</b></th>
                                <td class="table-center">{{ $examOneMark->cre ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->cre ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->cre ?? '-' }}</td>
                                <td class="table-center">{{ round($creAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>ISLAM</b></th>
                                <td class="table-center">{{ $examOneMark->islam ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->islam ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->islam ?? '-' }}</td>
                                <td class="table-center">{{ round($islamAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>HISTORY</b></th>
                                <td class="table-center">{{ $examOneMark->history ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->history ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->history ?? '-' }}</td>
                                <td class="table-center">{{ round($histAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>GHC</b></th>
                                <td class="table-center">{{ $examOneMark->ghc ?? '-' }}</td>
                                <td class="table-center">{{ $examTwoMark->ghc ?? '-' }}</td>
                                <td class="table-center">{{ $examThreeMark->ghc ?? '-' }}</td>
                                <td class="table-center">{{ round($ghcAvg,1) ? : null ?? '-' }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><b>MEAN SCORES</b></th>
                                <td class="table-center"><b>{{$examOneTotal/5}}</b></td>
                                <td class="table-center"><b>{{$examTwoTotal/5}}</b></td>
                                <td class="table-center"><b>{{$examThreeTotal/5}}</b></td>
                                <td class="table-center"><b>{{ round($overalTotalAvg,0)/5 }}</b></td>
                            </tr>
                            <tr>
                                <th><b>TOTAL</b></th>
                                <td class="table-center"><b>#</b></td>
                                <td class="table-center"><b>#</b></td>
                                <td class="table-center"><b>#</b></td>
                                <td class="table-center"><b>{{ round($overalTotalAvg,0) }}</b></td>
                            </tr>
                            <tr>
                                @foreach($classRankings as $mark_total => $pos)
                                    @if($mark_total === $mark->name)
                                <td colspan="2" width="50%" style="text-align: left;"><b>POSITIONS:</b> OVERAL 
                                    <b>{{$pos['rank']}}</b>:<b>{{$clasPositions->count()}}</b>   
                                </td>
                                    @endif
                                @endforeach

                                @foreach($streamRankings as $mark_total => $pos)
                                    @if($mark_total === $mark->name)
                                <td colspan="2" width="50%" style="text-align: right;">STREAM
                                    <b>{{$pos['rank']}}</b>:<b>{{ $mark->stream->students->count() }}</b>
                                </td>
                                    @endif
                                @endforeach
                            </tr>
                        </tfoot>
                                @endif
                            @endforeach
                        @endif
                    </table>
                    <b/>
                    <div class="col-md-12">
                        <p style="width: 100%">
                            <b>Recommendation:</b> .......................................................................................................................
                            .......................................................................................................................................................
                            .......................................................................................................................................................
                            .......................................................................................................................................................
                            ....................................................................................................................................................... 
                        </p>
                    </div>
                    <div style="margin-top: 40px;width: 100%">
                        <p>
                            <b style="margin-right: 250px">Principle's Sign ........................</b>
                            <b>Class Teacher's Sign .......................</b>
                        </p>
                    </div>
                    <br/><br/>
                    <div>
                        <p style="font-size: 20px;">
                            <b>CLOSING DATE:</b> <i style="margin-right: 300px">{{\Carbon\Carbon::parse($closingDate)->format('d/m/Y')}}</i>
                            <b>OPENING DATE:</b> <i>{{\Carbon\Carbon::parse($openingDate)->format('d/m/Y')}}</i>
                        </p>
                        <br/>
                        <p>
                            <i> 
                                <b>NB:</b> All students are supposed to report to school before 5.00pm on the opening day and this should be adhered to strictly.
                            </i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
