<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\TeacherTwoFAController;
use App\Http\Controllers\Admin\AdminTwoFAController;
use App\Http\Controllers\Librarian\LibrarianTwoFAController;
use App\Http\Controllers\Superadmin\SuperadminTwoFAController;
use App\Http\Controllers\Accountant\AccountantTwoFAController;
use App\Http\Controllers\Matron\MatronTwoFAController;
use App\Http\Controllers\Staff\StaffTwoFAController;
use App\Http\Controllers\Student\StudentTwoFAController;
use App\Http\Controllers\Admin\ReportExcelController;
use App\Http\Controllers\Admin\Pdf\PdfSortResultsController;
use App\Http\Controllers\Admin\Charts\ChartController;


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
//Superadmin 2FA
Route::controller(SuperadminTwoFAController::class)->prefix('superadmin')->name('superadmin.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//Admin 2FA
Route::controller(AdminTwoFAController::class)->prefix('admin')->name('admin.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//Teacher 2FA
Route::controller(TeacherTwoFAController::class)->prefix('teacher')->name('teacher.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//Librarian 2FA
Route::controller(LibrarianTwoFAController::class)->prefix('librarian')->name('librarian.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//Accountant 2FA
Route::controller(AccountantTwoFAController::class)->prefix('accountant')->name('accountant.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//Matron 2FA
Route::controller(MatronTwoFAController::class)->prefix('matron')->name('matron.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//Staff 2FA
Route::controller(StaffTwoFAController::class)->prefix('staff')->name('staff.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//Student 2FA
Route::controller(StudentTwoFAController::class)->prefix('student')->name('student.')->group(function(){
    Route::get('authentication-code', 'index')->name('2fa.index');
    Route::post('authentication-code/store', 'twoFAstore')->name('2fa.store');
    Route::get('authentication-code/resend', 'resend')->name('2fa.resend');
});

//START OF PREVENT BACK HISTORY ROUTE MIDDLEWARE
Route::group(['middleware' => 'prevent-back-history'], function(){
Route::resource('users','Admin\UserController');
Route::get('contact-us','User\PageController@contactForm')->name('contact.us');
Route::post('contact-us','User\PageController@contactSave')->name('contact.save');
Route::get('about-us','User\PageController@aboutUs')->name('about.page');

//START OF SUPERADMIN ROUTES
//Auth folder routes
Route::prefix('superadmin')->name('superadmin.')->namespace('Auth')->group(function(){
	Route::get('/login','SuperadminLoginController@showLoginForm')->name('login');
	Route::post('/login','SuperadminLoginController@login')->name('login.submit');
	Route::get('/logout','SuperadminLoginController@logout')->name('logout');
	//superadmin password reset routes
    Route::post('/password/email','SuperadminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','SuperadminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','SuperadminResetPasswordController@reset');
    Route::get('/password/reset/{token}','SuperadminResetPasswordController@showResetForm')->name('password.reset');
});
//Superadmin folder routes
Route::prefix('superadmin')->name('superadmin.')->namespace('Superadmin')->group(function(){
	Route::get('/','SuperAdminController@index')->name('dashboard');
	Route::resource('teachers','TeacherController');
	Route::resource('years','YearController');
	Route::resource('terms','TermController');
	Route::resource('classes','MyClassController');
	Route::resource('admins','AdminController');
	Route::resource('schools','SchoolController');
	Route::resource('librarians','LibrarianController');
	Route::resource('accountants','AccountantController');
	Route::resource('matrons','MatronController');
	Route::resource('staffs','StaffController');
	Route::resource('stream-sections','StreamSectionController');
	Route::resource('subjects','SubjectController');
	Route::resource('streams','StreamController');
	Route::resource('libraries','LibraryController');
	Route::resource('dormitories','DormitoryController');
	Route::resource('departments','DepartmentController');
	Route::resource('halls','HallController');
	Route::resource('farms','FarmController');
	Route::resource('clubs','ClubController');
	Route::resource('games','GameController');
	Route::resource('intakes','IntakeController');
	Route::resource('fields','FieldController');
	Route::get('/students','StudentController@students')->name('students');
	Route::get('/parents','ParentController@parents')->name('parents');
	Route::get('marksheet-form','ExcelController@marksheetsForm')->name('marksheet.form');
	Route::get('/delete-class-marksheets','DeleteReportMarksheetController')->name('delete.classMarksheets');
	//Superadmin Change Password Routes
	Route::get('/change-password','SuperadminChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','SuperadminChangePasswordController@store')->name('change-password.save');
	Route::get('/school-teachers/{school}','PdfController@schoolTeachers')->name('school.teachers');
	Route::get('excel-schoolteachers','ExcelController@exportSchoolTeachers')->name('export.shool_teachers');
	// Attach Subjects to teacher route
	Route::get('remove/teacher/{id}','StreamSubjectTeacherController@removeStreamSubjectTeacher')->name('streamteacher.remove');
	Route::post('/stream-subject-teacher/store','StreamSubjectTeacherController@store')->name('streamsubjectteacher.store');
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
	Route::post('/staff-bann/{id}','StaffBannedController@bann')->name('staff.bann');
	Route::post('/staff-unbann/{id}','StaffBannedController@unbann')->name('staff.unbann');
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
});

//START OF ADMIN ROUTES
//Auth folder routes
Route::prefix('admin')->name('admin.')->namespace('Auth')->group(function(){
	Route::get('/login','AdminLoginController@showLoginForm')->name('login');
	Route::post('/login','AdminLoginController@login')->name('login.submit');
	Route::get('/logout','AdminLoginController@logout')->name('logout');
	//admin password reset routes
    Route::post('/password/email','AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','AdminResetPasswordController@showResetForm')->name('password.reset');
});
//Admin folder routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
	Route::get('/','AdminController@index')->name('dashboard');
	Route::get('/profile','AdminController@adminProfile')->name('profile');
	Route::get('/teachers','TeacherController@index')->name('teachers');
	Route::get('/teachers/show/{id}','TeacherController@show')->name('teachers.show');
	Route::get('/departments','DepartmentController@index')->name('departments');
	Route::get('/departments/show/{id}','DepartmentController@show')->name('departments.show');
	Route::get('/clubs','ClubController@index')->name('clubs');
	Route::get('/clubs/show/{id}','ClubController@show')->name('clubs.show');
	Route::get('/school-students/{school}','PdfController@schoolStudents')->name('school.students');
	Route::get('/school-teachers/{school}','PdfController@schoolTeachers')->name('school.teachers');
	Route::get('/stream-students/{stream}','PdfController@streamStudents')->name('stream.students');
	Route::get('/class-teachers/{stream}','PdfController@streamTeachers')->name('stream.teachers');
	Route::get('/school-clubs/{school}','PdfController@schoolClubs')->name('school.clubs');
	Route::get('/club-students/{club}','PdfController@clubStudents')->name('club.students');
	Route::get('/club-teachers/{club}','PdfController@clubTeachers')->name('club.teachers');
	Route::get('/school-departments/{school}','PdfController@schoolDepts')->name('school.depts');
	Route::get('/department-teachers/{department}','PdfController@deptTeachers')->name('dept.teachers');
	Route::get('/school-letters/{letter}','PdfController@letter')->name('school.letters');
	Route::get('/school-staffs/{school}','PdfController@schoolStaffs')->name('school.staffs');
	Route::get('/letter-head/{school}','PdfController@letterHead')->name('letter.head');
	Route::get('/instant-download/{school}','PdfController@instantDownload')->name('instant.download');
	Route::get('/stream-facitators','PdfController@streamFacilitators')->name('stream.facilitators');
	Route::get('/student-details/{student}','PdfController@studentDetails')->name('student.details');
	Route::get('/class-marksheet','PdfController@classMarksheet')->name('class.marksheet');
	Route::get('/stream-marksheet','PdfController@streamMarksheet')->name('stream.marksheet');
	Route::get('/st-pdf-report-card-form','PdfController@studentReportCardForm')->name('studentPdf.reportCardForm');
	Route::get('/st-pdf-report-card','PdfController@studentReportCard')->name('studentPdf.reportCard');
	Route::get('/delete-reports','ReportsDeleteController')->name('delete.reports');
	//Instant Download controller route
	Route::get('/instant-download-form','Pdf\InstantDownloadController')->name('instantdownload.form');
	//Event Controller Routes
	Route::get('calendar-event', 'Event\EventController@index')->name('calendar.event');
	Route::post('fullcalendar/create', 'Event\EventController@create');
	Route::post('fullcalendar/update', 'Event\EventController@update');
	Route::post('fullcalendar/delete', 'Event\EventController@destroy');
	//Charts Routes
	Route::get('student-chart', [ChartController::class, 'index']);

	// Student Info
	Route::get('/student-details','StudentInfoController@studentInfo')->name('studentinfo.form');
	Route::get('/student-get-class','StudentInfoController@studentInfo')->name('student.class');
	//Reportcard Totals
	Route::post('/class-totals','ReportCardTotalsController@classTotalsStore')->name('classTotals.store');
	Route::post('/stream-totals','ReportCardTotalsController@streamTotalsStore')->name('streamTotals.store');
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
	Route::resource('letters','LetterController');
	Route::resource('sections','SectionController');
	Route::resource('galleries','GalleryController');
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
	Route::post('reportcard-comments','ExcelController@reportcardComments')->name('reportcard.comments');
	//Report Subject Grades Gradesheet Import route
	Route::post('reportcard-subject-grades','ExcelController@reportSubjectGradesStore')->name('report.subjectGrades');
	//Report General Grades Gradesheet Import route
	Route::post('reportcard-general-grades','ExcelController@reportGeneralGradesStore')->name('report.generalGrades');
	//Admin Change Password Routes
	Route::get('/change-password','AdminChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','AdminChangePasswordController@store')->name('change-password.save');
	//Mail Sent Route
	Route::get('mail-form','SendMailController@mailForm')->name('mail.form');
	Route::post('sent-mails','SendMailController@sendMail')->name('send.mail');

	Route::controller(PdfSortResultsController::class)->group(function(){
		Route::get('sort-results', 'sortClassResults')->name('sort.classresults');
	});

	//RoyceSMS Routes
	Route::namespace('RoyceSMS')->group(function(){
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

}); //END OF ADMIN ROUTES

//START OF TEACHER ROUTES
//Auth folder routes
Route::prefix('teacher')->name('teacher.')->namespace('Auth')->group(function(){
	Route::get('/login','TeacherLoginController@showLoginForm')->name('login');
	Route::post('/login','TeacherLoginController@login')->name('login.submit');
	Route::get('/logout','TeacherLoginController@logout')->name('logout');
	//teacher password reset routes
    Route::post('/password/email','TeacherForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','TeacherForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','TeacherResetPasswordController@reset');
    Route::get('/password/reset/{token}','TeacherResetPasswordController@showResetForm')->name('password.reset');
});

Route::prefix('teacher')->name('teacher.')->namespace('Teacher')->group(function(){
	Route::get('/','TeacherController@index')->name('dashboard');
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
	//Teacher Change Password Routes
	Route::get('/change-password','TeacherChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','TeacherChangePasswordController@store')->name('change-password.save');
});//END OF TEACHER ROUTES

//START OF STUDENT ROUTES
//Auth folder routes
Route::prefix('student')->name('student.')->namespace('Auth')->group(function(){
	Route::get('/login','StudentLoginController@showLoginForm')->name('login');
	Route::post('/login','StudentLoginController@login')->name('login.submit');
	Route::get('/logout','StudentLoginController@logout')->name('logout');
	//student password reset routes
    Route::post('/password/email','StudentForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','StudentForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','StudentResetPasswordController@reset');
    Route::get('/password/reset/{token}','StudentResetPasswordController@showResetForm')->name('password.reset');
	});
//Student folder routes
Route::prefix('student')->name('student.')->namespace('Student')->group(function(){
	Route::get('/','StudentController@index')->name('dashboard');
	Route::get('/stream/assignments','StudentController@streamAssignments')->name('stream.assignments');
	Route::get('/stream/students','StudentController@streamStudents')->name('stream.students');
	Route::get('/stream/teachers','StudentController@streamTeachers')->name('stream.teachers');
	Route::get('/stream/exams','StudentController@streamExams')->name('stream.exams');
	Route::get('/club/{id}','StudentController@showClub')->name('club');
	Route::get('/stream/meetings','StudentController@streamMeetings')->name('stream.meetings');
	Route::get('/stream/awards','StudentController@streamAwards')->name('stream.rewards');
	Route::get('/subject/notes/{id}','StudentController@subjectNotes')->name('subject.notes');
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
	//Student Change Password Routes
	Route::get('/change-password','StudentChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','StudentChangePasswordController@store')->name('change-password.save');
});//END OF STUDENT ROUTES

//START OF SURBODINADE STAFF ROUTES
//Auth folder routes
Route::prefix('staff')->name('staff.')->namespace('Auth')->group(function(){
	Route::get('/login','StaffLoginController@showLoginForm')->name('login');
	Route::post('/login','StaffLoginController@login')->name('login.submit');
	Route::get('/logout','StaffLoginController@logout')->name('logout');
	//substaff password reset routes
    Route::post('/password/email','StaffForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','StaffForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','StaffResetPasswordController@reset');
    Route::get('/password/reset/{token}','StaffResetPasswordController@showResetForm')->name('password.reset');
	});
//Staff folder routes
Route::prefix('staff')->name('staff.')->namespace('Staff')->group(function(){
	Route::get('/','StaffController@index')->name('dashboard');
	Route::get('/assignments','StaffController@assignments')->name('assignments');
	Route::get('/profile','StaffProfileController@staffProfile')->name('profile');
    //Admin Change Password Routes
	Route::get('/change-password','StaffChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','StaffChangePasswordController@store')->name('change-password.save');
	// Letter Head Route
	Route::get('/letter-head/{school}','PdfController@letterHead')->name('letter.head');
	//Instant Download Route
	Route::get('/instant-download-form','StaffController@instantDownloadForm')->name('instantdownload.form');
	Route::get('/instant-download/{school}','PdfController@instantDownload')->name('instant.download');
	// Search Student
	Route::get('/search-student','StaffController@studentSearch')->name('search.student');
});//END OF SURBODINADE STAFF ROUTES

//START OF PARENT ROUTES
//Auth folder routes
Route::prefix('parent')->name('parent.')->namespace('Auth')->group(function () {
    Route::get('/login', 'ParentLoginController@showLoginForm')->name('login');
    Route::post('/login', 'ParentLoginController@login')->name('login.submit');
    Route::get('/logout','ParentLoginController@logout')->name('logout');
    //parent password reset routes
    Route::post('/password/email','ParentForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','ParentForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','ParentResetPasswordController@reset');
    Route::get('/password/reset/{token}','ParentResetPasswordController@showResetForm')->name('password.reset');
});
//Parent folder routes
Route::prefix('parent')->name('parent.')->namespace('Parent')->group(function () {
	Route::get('/', 'ParentController@index')->name('dashboard');
	Route::get('/children', 'ParentController@parentChildren')->name('children');
	Route::get('/child/{child}', 'ParentController@showChild')->name('show.child');
	Route::get('/student/stream/{stream}', 'ParentController@studentStream')->name('child.stream');
	Route::get('/school-teachers', 'ParentController@schoolTeachers')->name('school.teachers');
	Route::get('/teacher/{teacher}', 'ParentController@showTeacher')->name('show.teacher');
	//Parent Profile Route
    Route::get('/profile','ParentProfileController@parentProfile')->name('profile');
    //Admin Change Password Routes
	Route::get('/change-password','ParentChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','ParentChangePasswordController@store')->name('change-password.save');
	//Exam MarkSheet Download Route
	Route::get('/download-results','PdfMarksResultsController@downloadResults')->name('download.results');
});//END OF PARENT ROUTES

//START OF ACCOUNTANT ROUTES
//Auth folder routes
Route::prefix('accountant')->name('accountant.')->namespace('Auth')->group(function () {
    Route::get('/login', 'AccountantLoginController@showLoginForm')->name('login');
    Route::post('/login', 'AccountantLoginController@login')->name('login.submit');
    Route::get('/logout','AccountantLoginController@logout')->name('logout');
    //accountant password reset routes
    Route::post('/password/email','AccountantForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','AccountantForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','AccountantResetPasswordController@reset');
    Route::get('/password/reset/{token}','AccountantResetPasswordController@showResetForm')->name('password.reset');
});
//Accountant folder routes
Route::prefix('accountant')->name('accountant.')->namespace('Accountant')->group(function () {
	Route::get('/', 'AccountantController@index')->name('dashboard');
	Route::get('/fee-queries', 'AccountantController@feeBalance')->name('fee.balance');
	//Accountant Profile Route
    Route::get('/profile','AccountantProfileController@accountantProfile')->name('profile');
    Route::resource('category-fees','CategoryFeeController');
    //Admin Change Password Routes
	Route::get('/change-password','AccountantChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','AccountantChangePasswordController@store')->name('change-password.save');
	//Payment Routes
	Route::resource('payments','PaymentController');
	Route::resource('paymentrecords','PaymentRecordController');
	// Student Profile
	Route::get('/student-profile','StudentController@student')->name('student.profile');
	//Student Payment Record Receipt Download Route
	Route::get('/download-receipt/{paymentRecord}','PdfController@paymentReceipt')->name('download.receipt');
	Route::get('/stream-fee-balances','PdfController@feeBalances')->name('stream.balances');
	Route::get('/student-payment-details','PdfController@studentPaymentDetails')->name('student.paymentDetails');
});//END OF ACCOUNTANT ROUTES

//START OF LIBRARIAN ROUTES
//Auth folder routes
Route::prefix('librarian')->name('librarian.')->namespace('Auth')->group(function () {
    Route::get('/login', 'LibrarianLoginController@showLoginForm')->name('login');
    Route::post('/login', 'LibrarianLoginController@login')->name('login.submit');
    Route::get('/logout','LibrarianLoginController@logout')->name('logout');
    //librarian password reset routes
    Route::post('/password/email','LibrarianForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','LibrarianForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','LibrarianResetPasswordController@reset');
    Route::get('/password/reset/{token}','LibrarianResetPasswordController@showResetForm')->name('password.reset');
});
//Librarian folder routes
Route::prefix('librarian')->name('librarian.')->namespace('Librarian')->group(function () {
	Route::get('/', 'LibrarianController@index')->name('dashboard');
	Route::resource('books','BookController');
	Route::resource('bookers','IssuedBooksController');
	Route::resource('category-books','CategoryBookController');
	//Libraries
	Route::get('school-libraries','LibrarianController@schoolLibraries')->name('school.libraries');
	Route::get('school-library/{library}','LibrarianController@library')->name('school.library');
    //Excel download
	Route::get('excel-books','BookExportController@exportBooks')->name('export.books');
	//Accountant Profile Route
    Route::get('/profile','LibrarianProfileController@librarianProfile')->name('profile');
    //Library Books PDF
    Route::get('/library-books/{school}','PdfController@libraryBooks')->name('library.books');
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
    //Librarian Change Password Routes
	Route::get('/change-password','LibrarianChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','LibrarianChangePasswordController@store')->name('change-password.save');
	// Search Book
	Route::get('/search-book','LibrarianController@book')->name('search.book');
	// Search Student
	Route::get('/search-student','IssuedBookUpdateController@student')->name('search.student');
	// Search Book Author
	Route::get('/book-author','LibrarianController@bookAuthor')->name('book.author');
});//END OF LIBRARIAN ROUTES

//START OF MATRON ROUTES
//Auth folder routes
Route::prefix('matron')->name('matron.')->namespace('Auth')->group(function () {
    Route::get('/login', 'MatronLoginController@showLoginForm')->name('login');
    Route::post('/login', 'MatronLoginController@login')->name('login.submit');
    Route::get('/logout','MatronLoginController@logout')->name('logout');
    //matron password reset routes
    Route::post('/password/email','MatronForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','MatronForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','MatronResetPasswordController@reset');
    Route::get('/password/reset/{token}','MatronResetPasswordController@showResetForm')->name('password.reset');
});
//Matron folder routes
Route::prefix('matron')->name('matron.')->namespace('Matron')->group(function () {
	Route::get('/', 'MatronController@index')->name('dashboard');
	Route::get('/dormitories/{id}', 'MatronController@dormitories')->name('dormitories');
	Route::get('/dormitory/{id}', 'MatronController@dormitory')->name('dormitory');
	//Parent Profile Route
    Route::get('/profile','MatronProfileController@matronProfile')->name('profile');
    //Matron Change Password Routes
	Route::get('/change-password','MatronChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','MatronChangePasswordController@store')->name('change-password.save');
});//END OF MATRON ROUTES

//ATTACH AND DETACH ADMIN BACKEND ROUTES
//Attach and Detach teacher to and from the class routes for admin
Route::post('att-teacher-stream/{id}','Stream\AttachTeacherController@attachTeacher')->name('attach.teacher.stream');
//Attach and Detach teacher to and from the class routes for Superadmin
Route::post('superadmin/att-teacher-stream/{id}','Stream\SuperadminAttachTeacherController@attachTeacher')->name('superadmin.attach.teacher.stream');
//Attach and Detach subject to and from the class routes for admin
Route::post('att-subject-stream/{id}','Stream\AttachSubjectController@attachSubject')->name('attach.subject.stream');
//Attach and Detach subject to and from the class routes for Superadmin
Route::post('superadmin/att-subject-stream/{id}','Stream\SuperadminAttachSubjectController@attachSubject')->name('superadmin.attach.subject.stream');
//Attach and Detach an exam to and from the class routes
Route::post('att-exam-stream/{id}','Stream\AttachExamController@attachExam')->name('attach.exam.stream');
//Attach and Detach an assignment to and from the class routes
Route::post('att-assign-stream/{id}','Stream\AttachAssignmentController@attachAssignment')->name('attach.assign.stream');
//Attach and Detach meeting to and from the class routes
Route::post('att-meeting-stream/{id}','Stream\AttachMeetingController@attachMeeting')->name('attach.meeting.stream');
//Attach and Detach an award to and from the class routes
Route::post('att-reward-stream/{id}','Stream\AttachRewardController@attachReward')->name('attach.reward.stream');
//Attach and Detach teacher to and from the department routes(by Superadmin)
Route::post('att-teacher-dept/{id}','Department\AttachTeacherController@attachTeacher')->name('attach.teacher.dept');
//Attach and Detach subordinade staff to and from the department routes(by Superadmin)
Route::post('att-sustaff-dept/{id}','Department\AttachStaffController@attachStaff')->name('attach.staff.dept');
//Attach and Detach meeting to and from the department routes
Route::post('att-meeting-dept/{id}','Department\AttachMeetingController@attachMeeting')->name('attach.meeting.dept');
//Attach and Detach meeting to and from the club routes
Route::post('att-meeting-club/{id}','Club\AttachMeetingController@attachMeeting')->name('attach.meeting.club');
//Attach and Detach student to and from the club routes
Route::post('att-student-club/{id}','Club\AttachStudentController@attachStudent')->name('attach.student.club');
//Attach and Detach teacher to and from the club routes
Route::post('att-teacher-club/{id}','Club\AttachTeacherController@attachTeacher')->name('attach.teacher.club');
//Attach and Detach Subordinade Staff to and from the club routes
Route::post('att-staff-club/{id}','Club\AttachStaffController@attachStaff')->name('attach.staff.club');
//Attach and Detach an award to and from the student routes
Route::post('att-reward-student/{id}','Student\AttachRewardController@attachReward')->name('attach.reward.student');
//Attach and Detach an assignment to and from the student routes
Route::post('att-assign-student/{id}','Student\AttachAssignmentController@attachAssignment')->name('attach.assign.student');
//Attach and Detach subject to and from the student routes
Route::post('att-subject-student/{id}','Student\AttachSubjectController@attachSubject')->name('attach.subject.student');
//Attach and Detach meeting to and from the student routes
Route::post('att-meeting-student/{id}','Student\AttachMeetingController@attachMeeting')->name('attach.meeting.student');
//Attach and Detach class to and from the teacher routes
Route::post('attach-stream/{id}','Teacher\AttachStreamController@attachStream')->name('attach.stream.teacher');
//Attach and Detach subject to and from the teacher routes
Route::post('att-subject-teacher/{id}','Teacher\AttachSubjectController@attachSubject')->name('attach.subject.teacher');
//Attach and Detach an assignment to and from the teacher routes
Route::post('att-assign-teacher/{id}','Teacher\AttachAssignmentController@attachAssignment')->name('attach.assign.teacher');
//Attach and Detach an award to and from the teacher routes
Route::post('att-reward-teacher/{id}','Teacher\AttachRewardController@attachReward')->name('attach.reward.teacher');
//Attach and Detach teacher to and from the meeting routes
Route::post('att-teacher-meeting/{id}','Meeting\AttachTeacherController@attachTeacher')->name('attach.teacher.meeting');
//Attach and Detach student to and from the meeting routes
Route::post('att-student-meeting/{id}','Meeting\AttachStudentController@attachStudent')->name('attach.student.meeting');
//Attach and Detach subordinade staff to and from the meeting routes
Route::post('att-staff-meeting/{id}','Meeting\AttachStaffController@attachStaff')->name('attach.staff.meeting');
//Attach and Detach class to and from the meeting routes
Route::post('att-std-meeting/{id}','Meeting\AttachStreamController@attachStream')->name('attach.stream.meeting');
//Attach student to and from the assignment routes
Route::post('att-student-assignment/{id}','Assignment\AttachStudentController@attachStudent')->name('attach.student.assignment');
//Attach and Detach subject to and from the exam routes
Route::post('att-subject-exam/{id}','Exam\AttachSubjectController@attachSubject')->name('attach.subject.exam');
//Attach and Detach meeting to and from the dormitory routes
Route::post('att-meeting-dom/{id}','Dormitory\AttachMeetingController@attachMeeting')->name('attach.meeting.dom');
//Attach and Detach meeting to and from the library routes
Route::post('att-meeting-lib/{id}','Library\AttachMeetingController@attachMeeting')->name('attach.meeting.lib');

}); //END OF PREVENT BACK HISTORY ROUTE MIDDLEWARE