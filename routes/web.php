<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthCode\TwoFactorAuthController;
use App\Http\Controllers\Admin\ReportExcelController;
use App\Http\Controllers\Admin\Pdf\PdfSortResultsController;
use App\Http\Controllers\Admin\Charts\ChartController;
use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Superadmin\ImpersonateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

//Two Factor Auth Controller
Route::controller(TwoFactorAuthController::class)->middleware('auth')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//START OF PREVENT BACK HISTORY ROUTE MIDDLEWARE
Route::group(['middleware' => 'prevent-back-history'], function(){
Route::get('contact-us','User\PageController@contactForm')->name('contact.us');
Route::post('contact-us','User\PageController@contactSave')->name('contact.save');
Route::get('about-us','User\PageController@aboutUs')->name('about.us');

//Change Password
Route::get('change-password', 'User\ChangePasswordController@index')->name('changePassword.form');
Route::post('change-password', 'User\ChangePasswordController@store')->name('change.password');

//START OF SUPERADMIN ROUTES
//Superadmin folder routes
Route::prefix('superadmin')->middleware(['auth','role:superadmin','impersonate.protect'])->name('superadmin.')->namespace('Superadmin')->group(function(){
	Route::get('/dashboard','SuperAdminController@index')->name('dashboard');
	Route::resource('users','UserController');
	Route::resource('teachers','TeacherController');
	Route::resource('years','YearController');
	Route::resource('terms','TermController');
	Route::resource('classes','MyClassController');
	Route::resource('admins','AdminController');
	Route::resource('schools','SchoolController');
	Route::resource('librarians','LibrarianController');
	Route::resource('accountants','AccountantController');
	Route::resource('matrons','MatronController');
	Route::resource('subordinates','SubordinateController');
	Route::resource('stream-sections','StreamSectionController');
	Route::resource('subjects','SubjectController');
	Route::resource('streams','StreamController');
	Route::resource('libraries','LibraryController');
	Route::resource('dormitories','DormitoryController');
	Route::resource('departments','DepartmentController');
	Route::resource('department-sections','DepartmentSectionController');
	Route::resource('halls','HallController');
	Route::resource('farms','FarmController');
	Route::resource('clubs','ClubController');
	Route::resource('games','GameController');
	Route::resource('intakes','IntakeController');
	Route::resource('fields','FieldController');
	Route::resource('sections','SectionController');
	Route::get('/students','StudentController@students')->name('students');
	Route::get('/parents','ParentController@parents')->name('parents');
	Route::get('marksheet-form','ExcelController@marksheetsForm')->name('marksheet.form');
	Route::get('/delete-class-marksheets','DeleteReportMarksheetController')->name('delete.classMarksheets');
	Route::get('/school-teachers/{school}','PdfController@schoolTeachers')->name('school.teachers');
	Route::get('excel-schoolteachers','ExcelController@exportSchoolTeachers')->name('export.shool_teachers');
	// Attach Subjects to teacher route
	Route::get('remove-subject/{id}','StreamSubjectController@removeStreamSubject')->name('streamsubject.remove');
	Route::post('/stream-subject-teacher/store','StreamSubjectController@store')->name('streamsubject.store');
	// Admin Bann Controller
	Route::post('/admin-bann/{id}','AdminBannedController@bann')->name('admin.bann');
	Route::post('/admin-unbann/{id}','AdminBannedController@unbann')->name('admin.unbann');
	// Teacher Bann Controller
	Route::post('/teacher-bann/{id}','TeacherBannedController@bann')->name('teacher.bann');
	Route::post('/teacher-unbann/{id}','TeacherBannedController@unbann')->name('teacher.unbann');
	// Student Bann Controller
	Route::post('/student-bann/{id}','StudentBannedController@bann')->name('student.bann');
	Route::post('/student-unbann/{id}','StudentBannedController@unbann')->name('student.unbann');
	// Accountant Bann Controller
	Route::post('/accountant-bann/{id}','AccountantBannedController@bann')->name('accountant.bann');
	Route::post('/accountant-unbann/{id}','AccountantBannedController@unbann')->name('accountant.unbann');
	// Librarian Bann Controller
	Route::post('/librarian-bann/{id}','LibrarianBannedController@bann')->name('librarian.bann');
	Route::post('/librarian-unbann/{id}','LibrarianBannedController@unbann')->name('librarian.unbann');
	// Sub Staff Bann Controller
	Route::post('/subordinate-bann/{id}','SubordinateBannedController@bann')->name('subordinate.bann');
	Route::post('/subordinate-unbann/{id}','SubordinateBannedController@unbann')->name('subordinate.unbann');
	// Matron Bann Controller
	Route::post('/matron-bann/{id}','MatronBannedController@bann')->name('matron.bann');
	Route::post('/matron-unbann/{id}','MatronBannedController@unbann')->name('matron.unbann');
	// Parent Bann Controller
	Route::post('/parent-bann/{id}','ParentBannedController@bann')->name('parent.bann');
	Route::post('/parent-unbann/{id}','ParentBannedController@unbann')->name('parent.unbann');
	// Student lock Controller
	Route::post('/student-lock/{id}','StudentLockController@lock')->name('student.lock');
	Route::post('/student-unlock/{id}','StudentLockController@unlock')->name('student.unlock');
	// Parent Lock Controller
	Route::post('/parent-lock/{id}','ParentLockController@lock')->name('parent.lock');
	Route::post('/parent-unlock/{id}','ParentLockController@unlock')->name('parent.unlock');
	// Impersonation Route
	Route::get('impersonate/{id}',[ImpersonateController::class,'impersonate'])->name('impersonate');

	// SUPERADMIN ATTACHMENT DETACHMENT ROUTES
	//Attach and Detach teacher to and from the class routes for Superadmin
	Route::post('att-detach-teacher-stream/{id}','Stream\AttachDetachTeacherController@attachDetachTeacher')->name('attachDetachTeacher.stream');
	//Attach and Detach subject to and from the class routes for admin
	Route::post('att-detach-subject-stream/{id}','Stream\AttachDetachSubjectController@attachDetachSubject')->name('attachDetachSubject.stream');
	//Attach and Detach teacher to and from the department routes(by Superadmin)
	Route::post('att-detach-teacher-dept/{id}','Department\AttachDetachTeacherController@attachDetachTeacher')->name('attachDetachTeacher.dept');
	//Attach and Detach subordinade staff to and from the department routes
	Route::post('att-detach-sustaff-dept/{id}','Department\AttachDetachSubordinateController@attachDetachSubordinate')->name('attachDetachSubordinate.dept');
	//Attach and Detach class to and from the teacher routes
	Route::post('attach-detach-stream-teacher/{id}','Teacher\AttachDetachStreamController@attachDetachStream')->name('attachDetachStream.teacher');
	//Attach and Detach subject to and from the teacher routes
	Route::post('att-detach-subject-teacher/{id}','Teacher\AttachDetachSubjectController@attachDetachSubject')->name('attachDetachSubject.teacher');
	//Attach and Detach student to and from the club routes
	Route::post('att-detach-student-club/{id}','Club\AttachDetachStudentController@attachDetachStudent')->name('attachDetachStudent.club');
	//Attach and Detach Subordinade Staff to and from the club routes
	Route::post('att-detach-subordinate-club/{id}','Club\AttachDetachSubordinateController@attachDetachSubordinate')->name('attachDetachSubordinate.club');
	//Attach and Detach teacher to and from the club routes
	Route::post('att-detach-teacher-club/{id}','Club\AttachDetachTeacherController@attachDetachTeacher')->name('attachDetachTeacher.club');
	//Attach and Detach meeting to and from the club routes
	Route::post('att-detach-meeting-club/{id}','Club\AttachDetachMeetingController@attachDetachMeeting')->name('attachDetachMeeting.club');
}); // END OF SUPERADMIN ROUTES

//START OF ADMIN ROUTES
//Admin folder routes
Route::namespace('Admin')->prefix('admin')->middleware(['auth','role:admin','admin-banned'])->name('admin.')->group(function(){
	Route::get('/dashboard','AdminController@index')->name('dashboard');
	Route::get('/profile','AdminController@adminProfile')->name('profile');
	Route::get('/school-pdf-docs','AdminController@schoolPdfDocs')->name('pdf.docs');
	Route::get('/teachers','TeacherController@index')->name('teachers');
	Route::get('/teachers/show/{id}','TeacherController@show')->name('teachers.show');
	Route::get('/departments','DepartmentController@index')->name('departments');
	Route::get('/departments/show/{id}','DepartmentController@show')->name('departments.show');
	Route::get('/clubs','ClubController@index')->name('clubs');
	Route::get('/clubs/show/{id}','ClubController@show')->name('clubs.show');
	Route::get('/school-students','PdfController@schoolStudents')->name('school.students');
	Route::get('/school-teachers','PdfController@schoolTeachers')->name('school.teachers');
	Route::get('/school-parents','PdfController@schoolParents')->name('school.parents');
	Route::get('/stream-students','PdfController@streamStudents')->name('stream.students');
	Route::get('/stream-register','PdfController@streamRegister')->name('stream.register');
	Route::get('/class-teachers','PdfController@streamTeachers')->name('stream.teachers');
	Route::get('/class-students','PdfController@classStudents')->name('class.students');
	Route::get('/school-clubs','PdfController@schoolClubs')->name('school.clubs');
	Route::get('/club-students','PdfController@clubStudents')->name('club.students');
	Route::get('/club-teachers','PdfController@clubTeachers')->name('club.teachers');
	Route::get('/school-departments/','PdfController@schoolDepts')->name('school.depts');
	Route::get('/department-teachers','PdfController@deptTeachers')->name('dept.teachers');
	Route::get('/department-subordinates','PdfController@deptSubordinates')->name('dept.subordinates');
	Route::get('/school-pdf-generation/{pdfGenerator}','PdfController@pdfGenerator')->name('pdf.generation');
	Route::get('/school-subordinates','PdfController@schoolSubordinates')->name('school.subordinates');
	Route::get('/dormitory-students','PdfController@dormitoryStudents')->name('dormitory.students');
	Route::get('/pdf-student-details','PdfController@studentDetails')->name('student.details');
	Route::get('/letter-head','PdfController@letterHead')->name('letter.head');
	Route::get('/instant-download/{school}','PdfController@instantDownload')->name('instant.download');
	Route::get('/student-exam-results','PdfController@studentExamResults')->name('student.examResults');
	Route::get('/class-marksheet','PdfController@classMarksheet')->name('class.marksheet');
	Route::get('/stream-marksheet','PdfController@streamMarksheet')->name('stream.marksheet');
	Route::get('/two-exams-report-card-form','PdfController@twoExamsReportCardForm')->name('twoexams.reportcardform');
	Route::get('/three-exams-report-card-form','PdfController@threeExamsReportCardForm')->name('threeexams.reportcardform');
	Route::get('/three-exams-report-card','PdfController@threeExamsReportCard')->name('threeexams.reportcard');
	Route::get('/two-exams-report-card','PdfController@twoExamsReportCard')->name('twoexams.reportcard');
	Route::get('/class-marksheet-pdf-chart','PdfController@classMarkSheetPdfChart')->name('classmarksheet.pdfchart');
	Route::get('/delete-reports','ReportsDeleteController')->name('delete.reports');
	//Instant Download controller route
	Route::get('/instant-download-form','Pdf\InstantDownloadController')->name('instantdownload.form');
	//Event Controller Routes
	Route::get('fullcalendar', [EventController::class, 'index'])->name('events.calendar');
	Route::post('fullcalendar-store', [EventController::class, 'store'])->name('event.store');
	//Charts Routes
	Route::get('student-chart', [ChartController::class, 'index']);
	//Leave Impersonation Route
	Route::get('impersonate-leave',[ImpersonateController::class,'impersonateLeave'])->name('impersonate-leave');

	// PaymentLock Controller
	Route::post('/lock-payment/{student}','PaymentLockController@lockPayment')->name('lock.payment');
	Route::post('/unlock-payment/{student}','PaymentLockController@unlockPayment')->name('.unlock.payment');

	// Student Info
	Route::get('/student-info-form','StudentInfoController@studentInfo')->name('studentinfo.form');
	Route::get('/student-get-class','StudentInfoController@studentInfo')->name('student.class');
	//Reportcard Totals
	Route::post('/two-exams-class-totals','ReportCardTotalsController@twoExamsClassTotalsStore')->name('twoexams.classtotals');
	Route::post('/three-exams-class-totals','ReportCardTotalsController@threeExamsClassTotalsStore')->name('threeexams.classtotals');
	Route::post('/two-exams-stream-totals','ReportCardTotalsController@twoExamsStreamTotalsStore')->name('twoexams.streamtotals');
	Route::post('/three-exams-stream-totals','ReportCardTotalsController@threeExamsStreamTotalsStore')->name('threeexams.streamtotals');
	//Downloads routes
    Route::get('timetable/{id}',['as'=>'timetable.download','uses'=>'DownloadTimetableController@dowmloadTimetable']);
	Route::get('assign-download/{id}',['as'=>'assignment.download','uses'=>'DownloadAssignmentController@dowmloadAssignment']);
	Route::get('notes-download/{id}',['as'=>'notes.download','uses'=>'DownloadNotesController@dowmloadNotes']);
	Route::get('search','SearchController@search')->name('search');
	//Sent sms on adimission
	Route::get('parent-sms','StudentController@sendSms');
	Route::resource('students','StudentController');
	Route::get('/streams','StreamController@index')->name('streams');
	Route::get('/stream/details/{id}','StreamController@details')->name('stream.details');
	Route::resource('exams','ExamController');
	Route::resource('assignments','AssignmentController');
	Route::resource('meetings','MeetingController');
	Route::resource('rewards','RewardController');
	Route::resource('attendances','AttendanceController');
	Route::resource('timetables','TimetableController');
	Route::resource('parents','MyParentController');
	Route::resource('notes','NoteController');
	Route::resource('pdf-generators','PdfGeneratorController');
	Route::resource('image-galleries','ImageGalleryController');
	Route::resource('payment-sections','PaymentSectionController');
	Route::resource('category-books','CategoryBookController');
	Route::resource('books','BookController');
	Route::get('std/teacher/{teacher}{stream}','StreamTeacherController@streamTeacher')->name('stream.teacher');
	//Excel download and imports routes
	Route::get('excel-students','ExportImportStudentController@exportStudents')->name('export.students');
	Route::get('excel-streamstudents/{stream}','ExcelController@exportStreamStudents')->name('export.stream_students');
	Route::get('excel-streamteachers/{stream}','ExcelController@exportStreamTeachers')->name('export.stream_teachers');
	Route::get('class-excel-marksheet','ExcelController@classResultMarks')->name('class.excelMarksheet');
	Route::get('stream-excel-marksheet','ExcelController@streamResultMarks')->name('stream.excelMarksheet');
	//Class Marksheet Import routes
	Route::get('marksheet-import-form','ExcelController@marksheetImportForm')->name('marksheet.importForm');
	//Streams Marksheets Import route
	Route::post('streams-marksheets','ExcelController@streamsMarksheets')->name('streams.marksheetsImport');
	//Marks Gradesheet Import route
	Route::post('marks-gradesheets','ExcelController@marksGradesStore')->name('marks.gradesheetsImport');
	//General Gradesheet Import route
	Route::post('general-gradesheets','ExcelController@generalGradesStore')->name('marks.generalGradesheetsImport');
	//Report Card Comments Import route
	Route::post('reportcard-general-remarks','ExcelController@reportGeneralRemarks')->name('reportcard.remarks');
	//Report Subject Grades Gradesheet Import route
	Route::post('reportcard-subject-grades','ExcelController@reportSubjectGradesStore')->name('report.subjectGrades');
	//Report Mean Grades Gradesheet Import route
	Route::post('reportcard-mean-grades','ExcelController@reportMeanGradesStore')->name('report.meangrades');
	//Mail Sent Route
	Route::get('mail-form','SendMailController@mailForm')->name('mail.form');
	Route::post('sent-mails','SendMailController@sendMail')->name('send.mail');

	Route::controller(PdfSortResultsController::class)->group(function(){
		Route::get('sort-results', 'sortClassResults')->name('sort.classresults');
	});

	//RoyceSMS Routes
	Route::namespace('RoyceSMS')->middleware(['auth','role:admin','admin-banned'])->group(function(){
	Route::get('roycesms/royceroute', ['uses' => 'RoyceSMSController@index']);
    Route::get('roycesms/dashboard', ['uses' => 'RoyceSMSController@messages']);
    Route::get('roycesms/', ['uses' => 'RoyceSMSController@messages']);
    Route::get('roycesms/base', ['uses' => 'RoyceSMSController@base']);
    Route::post('roycesms/deliveryreport', ['uses' => 'RoyceSMSController@deliveryReport']);
    Route::get('roycesms/contacts', ['uses' => 'RoyceSMSController@contacts']);
    Route::post('roycesms/contacts', ['uses' => 'RoyceSMSController@saveContacts']);
    Route::get('roycesms/contacts-group', ['uses' => 'RoyceSMSController@contactsGroup']);
    Route::post('roycesms/contacts-group', ['uses' => 'RoyceSMSController@saveContactsGroup']);
    Route::get('roycesms/single-text', ['uses' => 'RoyceSMSController@singleText']);
    Route::post('roycesms/single-text', ['uses' => 'RoyceSMSController@sendSingleText']);
    Route::get('roycesms/contacts-text', ['uses' => 'RoyceSMSController@contactsText']);
    Route::post('roycesms/contacts-text', ['uses' => 'RoyceSMSController@sendContactsText']);
    Route::get('roycesms/group-text', ['uses' => 'RoyceSMSController@groupText']);
    Route::post('roycesms/group-text', ['uses' => 'RoyceSMSController@sendGroupText']);
    Route::get('roycesms/delivery-report', ['uses' => 'RoyceSMSController@getDeliveryReport']);
    Route::post('roycesms/delivery-report', ['uses' => 'RoyceSMSController@pDeliveryReport']);
    Route::get('roycesms/set-webhook', ['uses' => 'RoyceSMSController@setWebhook']);
    Route::get('roycesms/delete/{id}', ['uses' => 'RoyceSMSController@deleteContact']);
    Route::get('roycesms/edit-group/{id}', ['uses' => 'RoyceSMSController@editGroup']);
    Route::get('roycesms/delete-group/{id}', ['uses' => 'RoyceSMSController@deleteGroup']);
    Route::post('roycesms/edit-contact-group', ['uses' => 'RoyceSMSController@editContactGroup']);
    Route::any('roycesms/receive-delivery-report', ['uses' => 'RoyceSMSController@receiveDeliveryReport']);
    
    // Route::get('technohive-sendsms', ['uses' => 'LaravelBulkSMSController@sms']);
    // Route::post('technohive-sendsms', ['uses' => 'LaravelBulkSMSController@sendSMS']);

    // Route::get('technohive-sendbulk', ['uses' => 'LaravelBulkSMSController@bulkSms']);
    // Route::post('technohive-sendbulk', ['uses' => 'LaravelBulkSMSController@sendBulkSMS']);
    // Route::get('test', function () {
    //     BulkSMS::sendSMS("Hey");
    // });
	});


	//ADMIN ATTACHMENT DETACHMENT ROUTES
	//Attach and Detach an Assignment to and from the Subordinate Staff routes
	Route::post('att-detach-assignment-subordinate/{id}','Subordinate\AttachDetachAssignmentController@attachDetachAssignment')->name('attachDetachAssignment.subordinate');
	//Attach and Detach an assignment to and from the stream routes
	Route::post('att-detach-assignment-stream/{id}','Stream\AttachDetachAssignmentController@attachDetachAssignment')->name('attachDetachAssignment.stream');
	//Attach and Detach an exam to and from the stream routes
	Route::post('att-detach-exam-stream/{id}','Stream\AttachDetachExamController@attachDetachExam')->name('attachDetachEexam.stream');
	//Attach and Detach meeting to and from the stream routes
	Route::post('att-detach-meeting-stream/{id}','Stream\AttachDetachMeetingController@attachDetachMeeting')->name('attachDetachMeeting.stream');
	//Attach and Detach an award to and from the class routes
	Route::post('att-detach-reward-stream/{id}','Stream\AttachDetachRewardController@attachDetachReward')->name('attachDetachReward.stream');
	//Attach and Detach meeting to and from the department routes
	Route::post('att-detach-meeting-dept/{id}','Department\AttachDetachMeetingController@attachDetachMeeting')->name('attachDetachMeeting.dept');
	//Attach and Detach meeting to and from the club routes
	Route::post('att-detach-meeting-club/{id}','Club\AttachDetachMeetingController@attachDetachMeeting')->name('attachDetachMeeting.club');
	//Attach and Detach student to and from the club routes
	Route::post('att-detach-student-club/{id}','Club\AttachDetachStudentController@attachDetachStudent')->name('attachDetachStudent.club');
	//Attach and Detach teacher to and from the club routes
	Route::post('att-detach-teacher-club/{id}','Club\AttachDetachTeacherController@attachDetachTeacher')->name('attachDetachTeacher.club');
	//Attach and Detach Subordinade Staff to and from the club routes
	Route::post('att-subordinate-club/{id}','Club\AttachDetachSubordinateController@attachDetachSubordinate')->name('attachDetachSubordinate.club');
	//Attach and Detach an award to and from the student routes
	Route::post('att-detach-reward-student/{id}','Student\AttachDetachRewardController@attachDetachReward')->name('attachDetachReward.student');
	//Attach and Detach an assignment to and from the student routes
	Route::post('att-detach-assign-student/{id}','Student\AttachDetachAssignmentController@attachDetachAssignment')->name('attachDetachAssignment.student');
	//Attach and Detach subject to and from the student routes
	Route::post('att-detach-subject-student/{id}','Student\AttachDetachSubjectController@attachDetachSubject')->name('attachDetachSubject.student');
	//Attach and Detach meeting to and from the student routes
	Route::post('att-detach-meeting-student/{id}','Student\AttachDetachMeetingController@attachDetachMeeting')->name('attachDetachMeeting.student');
	//Attach and Detach teacher to and from the meeting routes
	Route::post('att-detach-teacher-meeting/{id}','Meeting\AttachDetachTeacherController@attachDetachTeacher')->name('attachDetachTeacher.meeting');
	//Attach and Detach student to and from the meeting routes
	Route::post('att-detach-student-meeting/{id}','Meeting\AttachDetachStudentController@attachDetachStudent')->name('attachDetachStudent.meeting');
	//Attach and Detach subordinade staff to and from the meeting routes
	Route::post('att-detach-subordinate-meeting/{id}','Meeting\AttachDetachSubordinateController@attachDetachSubordinate')->name('attachDetachSubordinate.meeting');
	//Attach and Detach class to and from the meeting routes
	Route::post('att-detach-stream-meeting/{id}','Meeting\AttachDetachStreamController@attachDetachStream')->name('attachDetachStream.meeting');
	//Attach and Detach club to and from the meeting routes
	Route::post('att-detach-club-meeting/{id}','Meeting\AttachDetachClubController@attachDetachClub')->name('attachDetachClub.meeting');
	//Attach student to and from the assignment routes
	Route::post('att-detach-student-assignment/{id}','Assignment\AttachDetachStudentController@attachDetachStudent')->name('attachDetachStudent.assignment');
	//Attach and Detach subject to and from the exam routes
	Route::post('att-detach-subject-exam/{id}','Exam\AttachDetachSubjectController@attachDetachSubject')->name('attachDetachSubject.exam');
	//Attach and Detach meeting to and from the dormitory routes
	Route::post('att-detach-meeting-dom/{id}','Dormitory\AttachDetachMeetingController@attachDetachMeeting')->name('attachDetachMeeting.dormitory');
	//Attach and Detach meeting to and from the library routes
	Route::post('att-detach-meeting-lib/{id}','Library\AttachDetachMeetingController@attachDetachMeeting')->name('attachDetachMeeting.library');
	//Attach and Detach an assignment to and from the teacher routes
	Route::post('att-detach-assign-teacher/{id}','Teacher\AttachDetachAssignmentController@attachDetachAssignment')->name('attachDetachAssignmentTeacher');
	//Attach and Detach an award to and from the teacher routes
	Route::post('att-detach-reward-teacher/{id}','Teacher\AttachDetachRewardController@attachDetachReward')->name('attachDetachReward.teacher');
}); //END OF ADMIN ROUTES


//START OF TEACHER ROUTES
Route::prefix('teacher')->middleware(['auth','role:teacher','teacher-banned'])->name('teacher.')->namespace('Teacher')->group(function(){
	Route::get('/dashboard','TeacherController@index')->name('dashboard');
	Route::get('/school-teachers','TeacherController@schoolTeachers')->name('school.teachers');
	Route::get('/details/{teacher}','TeacherController@showTeacher')->name('show');
	Route::get('/streams','TeacherController@streams')->name('streams');
	Route::get('/stream/{stream}','TeacherController@showStream')->name('stream.show');
	Route::get('/show/{student}','TeacherController@showStudent')->name('student');
	Route::get('/departments','TeacherController@departments')->name('departments');
	Route::get('/department/{id}','TeacherController@showDepartment')->name('dept.show');
	Route::get('/profile','TeacherProfileController@teacherProfile')->name('profile');
    //Downloads routes
    Route::get('timetable/{id}',['as'=>'timetable.download','uses'=>'DownloadTimetableController@dowmloadTimetable']);
	Route::get('assign-download/{id}',['as'=>'assignment.download','uses'=>'DownloadAssignmentController@dowmloadAssignment']);
	Route::get('notes-download/{id}',['as'=>'notes.download','uses'=>'DownloadNotesController@dowmloadNotes']);
	Route::resource('assignments','AssignmentController');
	Route::post('notes','NotesController@storeNotes')->name('store.notes');
	Route::get('notes/{note}','NotesController@deleteNotes')->name('delete.notes');
});//END OF TEACHER ROUTES

//START OF STUDENT ROUTES
//Student folder routes
Route::prefix('student')->middleware(['auth','role:student','student-banned'])->name('student.')->namespace('Student')->group(function(){
	Route::get('/dashboard','StudentController@index')->name('dashboard');
	Route::get('/stream/assignments','StudentController@streamAssignments')->name('stream.assignments');
	Route::get('/stream/students','StudentController@streamStudents')->name('stream.students');
	Route::get('/stream/teachers','StudentController@streamTeachers')->name('stream.teachers');
	Route::get('/stream/exams','StudentController@streamExams')->name('stream.exams');
	Route::get('/club/{id}','StudentController@showClub')->name('club');
	Route::get('/stream/meetings','StudentController@streamMeetings')->name('stream.meetings');
	Route::get('/stream/awards','StudentController@streamAwards')->name('stream.rewards');
	Route::get('/subject/notes/{id}','StudentController@streamSubjectNotes')->name('subject.notes');
	Route::get('/notes/{note}','StudentController@streamOnlineNotes')->name('online.notes');
	Route::get('/library/books','StudentController@libraryBooks')->name('library.books');
	Route::get('/school/fields','StudentController@schoolFields')->name('school.fields');
	Route::get('/school/halls','StudentController@schoolHalls')->name('school.halls');
	Route::get('/borrowed/books','StudentController@borrowedBooks')->name('borrowed.books');
	Route::get('/profile','StudentProfileController@studentProfile')->name('profile');
    //Downloads routes
    Route::get('timetable/{id}',['as'=>'timetable.download','uses'=>'DownloadTimetableController@dowmloadTimetable']);
	Route::get('assign-download/{id}',['as'=>'assignment.download','uses'=>'DownloadAssignmentController@dowmloadAssignment']);
	Route::get('notes-download/{id}',['as'=>'notes.download','uses'=>'DownloadNotesController@dowmloadNotes']);
	//Exam MarkSheet Download Route
	Route::get('/download-results','PdfMarksResultsController@downloadResults')->name('download.results');
	//Teacher details route
	Route::get('teacher/info/{id}','StudentController@teacherDetails')->name('teacher.details');
});//END OF STUDENT ROUTES

//START OF SURBODINADE STAFF ROUTES
//Staff folder routes
Route::prefix('subordinate')->middleware(['auth','role:subordinate','subordinate-banned'])->name('subordinate.')->namespace('Subordinate')->group(function(){
	Route::get('/dashboard','SubordinateController@index')->name('dashboard');
	Route::get('/assignments','SubordinateController@assignments')->name('assignments');
	Route::get('/profile','SubordinateProfileController@subordinateProfile')->name('profile');
	// Letter Head Route
	Route::get('/letter-head/{school}','PdfController@letterHead')->name('letter.head');
	//Instant Download Route
	Route::get('/instant-download-form','SubordinateController@instantDownloadForm')->name('instantdownload.form');
	Route::get('/instant-download/{school}','PdfController@instantDownload')->name('instant.download');
	// Search Student
	Route::get('/search-student','SubordinateController@studentSearch')->name('search.student');
});//END OF SURBODINADE STAFF ROUTES

//START OF PARENT ROUTES
//Parent folder routes
Route::prefix('parent')->middleware(['auth','role:parent','parent-banned'])->name('parent.')->namespace('Parent')->group(function () {
	Route::get('/dashboard', 'ParentController@index')->name('dashboard');
	Route::get('/children', 'ParentController@parentChildren')->name('children');
	Route::get('/child/{child}', 'ParentController@showChild')->name('show.child');
	Route::get('/student/stream/{stream}', 'ParentController@studentStream')->name('child.stream');
	Route::get('/school-teachers', 'ParentController@schoolTeachers')->name('school.teachers');
	Route::get('/teacher/{teacher}', 'ParentController@showTeacher')->name('show.teacher');
	//Parent Profile Route
    Route::get('/profile','ParentProfileController@parentProfile')->name('profile');
	//Exam MarkSheet Download Route
	Route::get('/child-exam-results','PdfMarksResultsController@childExamResults')->name('download.examresults');
});//END OF PARENT ROUTES

//START OF ACCOUNTANT ROUTES
//Accountant folder routes
Route::prefix('accountant')->middleware(['auth','role:accountant','accountant-banned'])->name('accountant.')->namespace('Accountant')->group(function () {
	Route::get('/dashboard', 'AccountantController@index')->name('dashboard');
	Route::get('/fee-queries', 'AccountantController@feeBalance')->name('fee.balance');
	//Accountant Profile Route
    Route::get('/profile','AccountantProfileController@accountantProfile')->name('profile');
    Route::resource('category-fees','CategoryFeeController');
	// Payment Routes
	Route::resource('payments','PaymentController');
	Route::resource('paymentrecords','PaymentRecordController');
	// Student Profile
	Route::get('/student-profile','StudentController@student')->name('student.profile');
	Route::get('/make-payment/{id}','StudentController@makePayment')->name('make.payment');
	//Student Payment Record Receipt Download Route
	Route::get('/download-receipt/{paymentRecord}','PdfController@paymentReceipt')->name('download.receipt');
	Route::get('/stream-fee-balances','PdfController@streamFeeBalances')->name('stream.balances');
	Route::get('/class-fee-balances','PdfController@classFeeBalances')->name('class.balances');
	Route::get('/student-payment-statement','PdfController@studentPaymentStatement')->name('student.paymentStatement');
	Route::get('/payments-by-reference-number','PdfController@paymentsByRefNo')->name('paymentsBy.refNo');
});//END OF ACCOUNTANT ROUTES

//START OF LIBRARIAN ROUTES
//Librarian folder routes
Route::prefix('librarian')->middleware(['auth','role:librarian','librarian-banned'])->name('librarian.')->namespace('Librarian')->group(function () {
	Route::get('/dashboard', 'LibrarianController@index')->name('dashboard');
	Route::resource('bookers','IssuedBooksController');
	
	//Libraries
	Route::get('school-libraries','LibrarianController@schoolLibraries')->name('school.libraries');
	Route::get('school-library/{library}','LibrarianController@library')->name('school.library');
    //Excel download
	Route::get('excel-books','BookExportController@exportBooks')->name('export.books');
	//Accountant Profile Route
    Route::get('/profile','LibrarianProfileController@librarianProfile')->name('profile');
    //Library Books PDF
    Route::get('/library-books','PdfController@libraryBooks')->name('library.books');
    //Library Borrowed Books PDF
    Route::get('/borrowed-pdf','PdfController@borrowedBooks')->name('borrowed.pdf');
    Route::get('/book-return-date','PdfController@issuedBooksByReturnDate')->name('issuedbook.returnDate');
    Route::get('/book-issued-date','PdfController@issuedBooksByDateOfIssue')->name('issuedbook.issuedDate');
    //Excel Download
    Route::get('/borrowed-excel','ExcelController@exportIssuedBooks')->name('borrowed.excel');
    //Update Issued Book
    Route::post('issued-book/{booker}/return','IssuedBookUpdateController@issuedBookReturned')->name('issuedbook.returned');
    Route::post('issued-book/{booker}/faulty','IssuedBookUpdateController@issuedBookFaulty')->name('issuedbook.faulty');
    Route::post('faulty-book/{booker}/cleared','IssuedBookUpdateController@clearFaultyBook')->name('faultybook.cleared');
    Route::post('book-not-returned/{booker}/reset','IssuedBookUpdateController@bookNotyetReturned')->name('notyetreturned.reset');
	// Search Book
	Route::get('/search-book','LibrarianController@book')->name('search.book');
	// Search Student
	Route::get('/search-student','IssuedBookUpdateController@student')->name('search.student');
	// Search Book Author
	Route::get('/book-author','LibrarianController@bookAuthor')->name('book.author');
});//END OF LIBRARIAN ROUTES

//START OF MATRON ROUTES
//Matron folder routes
Route::prefix('matron')->middleware(['auth','role:matron','matron-banned'])->name('matron.')->namespace('Matron')->group(function () {
	Route::get('/dashboard', 'MatronController@index')->name('dashboard');
	Route::get('/dormitories', 'MatronController@dormitories')->name('dormitories');
	Route::get('/dormitory/{id}', 'MatronController@dormitory')->name('dormitory');
	Route::get('/dormitory-queries', 'MatronController@dormitoryQueries')->name('dormitory.queries');
	Route::post('/student-bednumber','MatronController@studentBedNumber')->name('student.bednumber');
	//Parent Profile Route
    Route::get('/profile','MatronProfileController@matronProfile')->name('profile');
	Route::get('/dormitory-students','PdfController@dormitoryStudents')->name('dormitory.students');
});//END OF MATRON ROUTES
}); //END OF PREVENT BACK HISTORY ROUTE MIDDLEWARE