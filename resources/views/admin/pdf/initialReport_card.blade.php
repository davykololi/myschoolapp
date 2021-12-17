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
                            <u>{{$title}}</u>
                        </h2>
                    </div>
                    <br/>
                    <table class="table table-bordered">
                        <caption>
                            <p class="left"><b>Name:</b> <i>{{$report->name}}</i></p>
                            <p class="right"><b>Class:</b> ..................</p>
                        </caption>
                        <thead>
                            <tr>
                                <th class="bgcolor-grey"><b>SUBJECTS</b></th>
                                <th class="bgcolor-grey"><b>MARKS</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="table-left"><b>MATHEMATICS</b></th>
                                <td class="table-center">{{ $report->maths_mark}}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>ENGLISH</b></th>
                                <td class="table-center">{{ $report->english_mark}}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>KISWAHILI</b></th>
                                <td class="table-center">{{ $report->kisw_mark}}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>SCIENCE</b></th>
                                <td class="table-center">{{ $report->science_mark}}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>C.R.E</b></th>
                                <td class="table-center">{{ $report->cre_mark}}</td>
                            </tr>
                            <tr>
                                <th class="table-left"><b>TOTAL MARKS</b></th>
                                <td class="table-center">
                                    <b>{{$report->maths_mark + $report->english_mark + $report->kisw_mark + $report->science_mark + $report->cre_mark}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10" width="100%">Position: ........ out of <b>{{$report->count()}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <b/>
                    <div class="col-md-12">
                        <p style="width: 100%">
                            <b>Recommendation:</b> <i>{{$report->recommendation}}</i>
                        </p>
                    </div>
                    <div style="margin-top: 200px;width: 100%">
                        <p><b>Principle's Signature .........................................</b></p>
                    </div>
                    <div style="margin-top: 150px">
                        <p><b>Class Teacher's Signature ..............................</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
