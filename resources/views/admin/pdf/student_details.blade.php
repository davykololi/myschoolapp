@extends('layouts.student_details')
@section('title', '| Student Details')

@section('content')
<!-- Styles -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt"><x-pdf-portrait-current-date/></div>
            <h2><u>{{$title}}</u></h2>
            <div> 
                @if(($student->image === "image.png") && ($student->user->gender === "Male"))
                <img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/static/avatar.png'))) !!}" width="200px" height="200px" align="right" style="border: 5px double gray; float: right;margin-right: 10px;">
                @elseif(($student->image === "image.png") && ($student->user->gender === "Female"))
                <img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/static/female_avatar.png'))) !!}" width="200px" height="200px" align="right" style="border: 5px double gray; float: right;margin-right: 10px;">
                @else
                <img src="data:image/png;base64,{!! base64_encode(file_get_contents(public_path('/storage/storage/'.$student->image))) !!}" width="200px" height="200px" style="border: 5px double gray;float: right; margin-right: 10px;">
                @endif     
            </div>  
            <br/>
            <div class="row">
                <div style="margin-top: 200px;">
                    <table>
                        <caption>
                            <h3><b><u>PERSONAL INFORMATION</u></b></h3>
                        </caption>
                        <tbody>
                            <tr>
                                <td class="td"><b> FULL NAME:</b> {{ $student->user->full_name }}</td>
                            </tr>
                            <tr>
                                <td class="td"><b> F.NAME:</b> {{ $student->user->first_name }}</td>
                                <td class="td"><b> M.NAME:</b> {{ $student->user->middle_name }}</td>
                                <td class="td"><b> L.NAME:</b> {{ $student->user->last_name }}</td>
                            </tr>
                             <tr>
                                <td class="td"><b>D.O.B:</b> {{ $student->getDob() }}</td>
                                <td class="td"><b>AGE:</b> {{ $student->age }} Years</td>
                                <td class="td"><b>GENDER:</b> {{ $student->gender }} </td>
                            </tr>
                        </tbody>
                    </table>

                    <table>
                        <caption>
                            <h3><b><u>PARENT/GUARDIAN DETAILS</u></b></h3>
                        </caption>
                        <tbody>
                            <tr>
                                <td class="td"><b>NAME:</b> {{ $student->parent->user->full_name }}</td>
                                <td class="td"><b>PHONE:</b> {{ $student->parent->phone_no }}</td>
                            </tr>
                            <tr>
                                <td class="td"><b>C.ADDRESS</b> {{ $student->parent->current_address }}</td>
                                <td class="td"><b>P.ADDRESS</b> {{ $student->parent->permanent_address }}</td>
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
                            @endif
                        </tbody>
                        <tfoot>
                             @if(is_null($student->student_info))
                            <tr>
                                <td>
                                    <span class="text-danger">No more information provided about the patent(s)/Guardian.</span>
                                </td>
                            </tr>
                            @endif
                        </tfoot>
                    </table>
                
                    <table>
                        <caption style="width: 82%">
                            <h3><b><u>ADMISSION DETAILS</u></b></h3>
                        </caption>
                        <tbody>
                            <tr>
                                <td class="td"><b>DOA:</b> {{ $student->getDoa() }}</td>
                                <td class="td"><b>Intake:</b> {{ $student->getAdmissionMonth() }} Intake</td>
                            </tr>
                            <tr>
                                <td class="td"><b>Admission No.:</b> {{ $student->admission_no }}</td>
                                <td class="td"><b>Admission Marks:</b> {{ $student->adm_mark }}</td>
                            </tr>
                            <tr>
                                <td class="td"><b>Class:</b> {{ $student->stream->name }}</td>
                                <td class="td"><b>Dormitory:</b> {{ $student->dormitory->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                
                    <table>
                        <caption style="width: 82%;">
                            <h3><b><u>STUDENT STREAM SUBJECTS</u></h3>
                        </caption>
                        <tbody>
                            <tr>
                                @if(!empty($streamSubjects))
                                    <p class="p1">
                                        <b>{{ $student->user->full_name  }} {{ __('belongs to') }} {{ $student->stream->name }} which offers the following subjects:</b>
                                    </p>
                                    <span>{!! \Arr::join($streamSubjects, ', ', ', and ') !!}.</span>
                                @else
                                    <span style="color: red">No subjects assigned to {{ $student->stream->name }} at the moment.</span>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>
</div>        
@endsection
