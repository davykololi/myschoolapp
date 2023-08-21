<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_report_head')
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
                        <h2 class="title">
                            <u style="font-family: impact;margin-top: -30px">{{$title}}</u>
                        </h2>
                        <p style="font-size: 20px;margin-bottom: 12px;text-transform: uppercase;">
                            <u>{{$year->year}} {{$term->name}}</u>
                        </p>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 10px; width: 100%; flex-direction:;" class="uppercase col-12">
                            <span style="text-align: left;display: inline-flex;"><b>Name: </b><i>{{ $markName }}</i></span>
                            <span style="text-align: right;display: inline-flex;margin-left: 120px;"><b>Class:</b> {{Auth::user()->stream->name}}</span>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr style="width:100%;background-color: gray;color: white;">
                                <th style="width: 50%"><b>{{ __('SUBJECTS') }}</b></th>
                                <th style="width: 50%"><b>{{ __('MARKS') }}</b></th>
                            </tr>
                        </thead>
                        @if(!empty($marks))
                        @foreach($marks as $mark)
                        @if(($mark->name === Auth::user()->full_name) && ($mark->stream->id === Auth::user()->stream->id) && ($mark->term->id === $term->id) && ($mark->exam->id === $exam->id) && ($mark->year->id === $year->id))
                        <tbody>
                            @if(!is_null($mark->mathematics))
                            <tr>
                                <th class="table-left">MATHEMATICS</th>
                                <td class="table-left" style="line-height: 0.5px;">
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
                            <tr>
                                <th class="table-left">ENGLISH</th>
                                <td class="table-left" style="line-height: 0.5px;">
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

                            @if(!is_null($mark->ghc))
                            <tr>
                                <th class="table-left">GHC</th>
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
                            </tr>
                            @else
                            @endif 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="table-left" style="border-top: 1px solid black;"><b>MEAN SCORE</b></th>
                                <td class="table-left" style="border-top: 1px solid black;">
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
                                <th class="table-left" style="border-top: 1px solid black;"><b>TOTAL MARKS</b></th>
                                <td class="table-left" style="border-top: 1px solid black;"><b>{{ round($mark->total,1) }}</b></td>
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
</body>
</html>
