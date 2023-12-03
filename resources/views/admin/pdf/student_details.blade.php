@extends('layouts.student_details')
@section('title', '| Student Details')

@section('content')
<!-- Styles -->
<div class="container">
    <x-pdf-portrait-current-date/>
    <div><h2 class="title"><u>{{$title}}</u></h2></div>
    <div>
            @if(!empty($student->image))
            <img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.$student->image))) !!}" width="200px" height="200px" style="border: 5px double gray;float: right; margin-right: 10px;"> 
            @else
            <img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/static/avatar.png'))) !!}" width="200px" height="200px" align="right" style="border: 5px double gray; float: right;margin-right: 10px;">
            @endif     
    </div>  
    <br/>
    <div class="row">
        <div class="col-md-12" style="margin-top: 200px;">
            <table>
                <caption>
                    <h3><b><u>PERSONAL INFORMATION</u></b></h3>
                </caption>
                <tbody>
                    <tr>
                        <td><b> F.NAME:</b> {{ $student->first_name }}</td>
                        <td><b> M.NAME:</b> {{ $student->middle_name }}</td>
                        <td><b> L.NAME:</b> {{ $student->last_name }}</td>
                    </tr>
                    <tr>
                        <td><b>FULL NAME:</b> {{ $student->full_name }}</td>
                    </tr>
                    <tr>
                        <td><b>D.O.B:</b> {{ $student->getDob() }}</td>
                        <td><b>AGE:</b> {{ $student->age }} Years</td>
                    </tr>
                    @if(!is_null($student->student_info))
                    <tr>
                        <td><b>MOTHER'S NAME:</b> {{ $student->student_info->mothers_name }}</td>
                    </tr>
                    <tr>
                        <td><b>MOTHERS OCCUPATION:</b> {{ $student->student_info->mothers_occupation }}</td>
                    </tr>
                    <tr>
                        <td><b>FATHER'S NAME:</b> {{ $student->student_info->fathers_name }}</td>
                    </tr>
                    <tr>
                        <td><b>FATHERS OCCUPATION:</b> {{ $student->student_info->fathers_occupation }}</td>
                    </tr>
                    <tr>
                        <td><b>GUARDIAN NAME:</b> {{ $student->student_info->guardian_name }}</td>
                    </tr>
                    <tr>
                        <td><b>GUARDIAN OCCUPATION:</b> {{ $student->student_info->guardian_occupation }}</td>
                    </tr>
                    @else
                    <tr>
                        <td><span class="text-danger">No data provided about the patent(s)/Guardian.</span></td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <table>
                <caption>
                    <h3><b><u>ADMISSION DETAILS</u></b></h3>
                </caption>
                <tbody>
                    <tr>
                        <td><b>DOA:</b> {{ $student->getDoa() }}</td>
                        <td><b>Intake:</b> {{ $student->getAdmissionMonth() }} Intake</td>
                    </tr>
                    <tr>
                        <td><b>Admission No.:</b> {{ $student->admission_no }}</td>
                        <td><b>Admission Marks:</b> {{ $student->adm_mark }}</td>
                    </tr>
                    <tr>
                        <td><b>Class:</b> {{ $student->stream->name }}</td>
                        <td><b>Dormitory:</b> {{ $student->dormitory->name }}</td>
                    </tr>
                </tbody>
            </table>

            <table>
                <caption>
                    <h3><b><u>STUDENT STREAM SUBJECTS</u></b></h3>
                </caption>
                <tbody>
                    <tr>
                        @if(!empty($streamSubjects))
                            <span>{!! \Arr::join($streamSubjects, ', ', ', and ') !!}.</span>
                        @else
                        <span style="color: red">No subjects assigned to this student stream at the moment.</span>
                        @endif
                    </tr>
                </tbody>
            </table>        
        </div>
    </div>
</div>        
@endsection
