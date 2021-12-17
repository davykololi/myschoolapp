<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportExcelController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

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
	Route::resource('years','YearController');
	Route::resource('terms','TermController');
	Route::resource('admins','AdminController');
	Route::resource('schools','SchoolController');
	Route::resource('librarians','LibrarianController');
	Route::resource('accountants','AccountantController');
	Route::resource('matrons','MatronController');
	Route::resource('blood-groups','BloodGroupController');
	Route::resource('category-schools','CategorySchoolController');
	Route::resource('stream-sections','StreamSectionController');
	Route::resource('position-teachers','PositionTeacherController');
	Route::resource('position-librarians','PositionLibrarianController');
	Route::resource('position-matrons','PositionMatronController');
	Route::resource('position-accountants','PositionAccountantController');
	Route::get('marksheet-form','ExcelController@marksheetsForm')->name('marksheet.form');
	Route::get('/delete-class-marksheets','DeleteReportMarksheetController')->name('delete.classMarksheets');
	//Superadmin Change Password Routes
	Route::get('/change-password','SuperadminChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','SuperadminChangePasswordController@store')->name('change-password.save');
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
	Route::get('/school-students/{school}','PdfController@schoolStudents')->name('school.students');
	Route::get('/stream-students/{stream}','PdfController@streamStudents')->name('stream.students');
	Route::get('/class-teachers/{stream}','PdfController@streamTeachers')->name('stream.teachers');
	Route::get('/school-teachers/{school}','PdfController@schoolTeachers')->name('school.teachers');
	Route::get('/school-clubs/{school}','PdfController@schoolClubs')->name('school.clubs');
	Route::get('/club-students/{club}','PdfController@clubStudents')->name('club.students');
	Route::get('/club-teachers/{club}','PdfController@clubTeachers')->name('club.teachers');
	Route::get('/school-departments/{school}','PdfController@schoolDepts')->name('school.depts');
	Route::get('/department-teachers/{department}','PdfController@deptTeachers')->name('dept.teachers');
	Route::get('/school-letters/{letter}','PdfController@letter')->name('school.letters');
	Route::get('/school-staffs/{school}','PdfController@schoolStaffs')->name('school.staffs');
	Route::get('/letter-head/{school}','PdfController@letterHead')->name('letter.head');
	Route::get('/report-card/{report}','PdfController@reportCard')->name('report.card');
	Route::get('/stream-facitators','PdfController@streamFacilitators')->name('stream.facilitators');
	Route::get('/class-marksheet','PdfController@classMarksheet')->name('class.marksheet');
	Route::get('/stream.marksheet','PdfController@streamMarksheet')->name('stream.pdfMarksheet');
	Route::get('/st-pdf-report-card-form','PdfController@studentReportCardForm')->name('studentPdf.reportCardForm');
	Route::get('/st-pdf-report-card','PdfController@studentReportCard')->name('studentPdf.reportCard');
	Route::get('/delete-reports','ReportsDeleteController')->name('delete.reports');
	//Reportcard Totals
	Route::post('/class-totals','ReportCardTotalsController@classTotalsStore')->name('classTotals.store');
	Route::post('/stream-totals','ReportCardTotalsController@streamTotalsStore')->name('streamTotals.store');
	Route::get('/class-totals-clear','ReportCardTotalsController@clearClassTotals')->name('classTotals.clear');
	Route::get('/stream-totals-clear','ReportCardTotalsController@clearStreamTotals')->name('streamTotals.clear');
	//Downloads routes
    Route::get('timetable/{id}',['as'=>'timetable.download','uses'=>'DownloadTimetableController@dowmloadTimetable']);
	Route::get('examtable/{id}',['as'=>'examtimetable.download','uses'=>'DownloadExamTimetableController@dowmloadExamTimetable']);
	Route::get('assign-download/{id}',['as'=>'assignment.download','uses'=>'DownloadAssignmentController@dowmloadAssignment']);
	Route::get('notes-download/{id}',['as'=>'notes.download','uses'=>'DownloadNotesController@dowmloadNotes']);
	Route::get('importReportView', [ReportExcelController::class, 'importExportView'])->name('report_view');
	// Route for export/download tabledata to .csv, .xls or .xlsx
	Route::get('export-report-cards/{type}', [ReportExcelController::class, 'exportReportCards'])->name('export.reportCards');
	// Route for import excel data to database.
	Route::post('import-report-cards', [ReportExcelController::class, 'importReportCards'])->name('import.reportCards');
	Route::get('search','SearchController@search')->name('search');
	//Sent sms on adimission
	Route::get('parent-sms','StudentController@sendSms');
	Route::resource('students','StudentController');
	Route::resource('streams','StreamController');
	Route::resource('intakes','IntakeController');
	Route::resource('dormitories','DormitoryController');
	Route::resource('subjects','SubjectController');
	Route::resource('departments','DepartmentController');
	Route::resource('teachers','TeacherController');
	Route::resource('staffs','StaffController');
	Route::resource('clubs','ClubController');
	Route::resource('exams','ExamController');
	Route::resource('assignments','AssignmentController');
	Route::resource('meetings','MeetingController');
	Route::resource('rewards','RewardController');
	Route::resource('attendances','AttendanceController');
	Route::resource('libraries','LibraryController');
	Route::resource('halls','HallController');
	Route::resource('timetables','TimetableController');
	Route::resource('subs','StandardSubjectController');
	Route::resource('notes','NoteController');
	Route::resource('parents','MyParentController');
	Route::resource('position-students','PositionStudentController');
	Route::resource('position-staffs','PositionStaffController');
	Route::resource('category-exams','CategoryExamController');
	Route::resource('category-farms','CategoryFarmController');
	Route::resource('category-fields','CategoryFieldController');
	Route::resource('category-games','CategoryGameController');
	Route::resource('category-subjects','CategorySubjectController');
	Route::resource('category-halls','CategoryHallController');
	Route::resource('farms','FarmController');
	Route::resource('games','GameController');
	Route::resource('fields','FieldController');
	Route::resource('letters','LetterController');
	Route::resource('reports','ReportController');
	Route::resource('classes','MyClassController');
	Route::resource('grade-systems','GradeSystemController');
	Route::resource('sections','SectionController');
	Route::get('std/teacher/{teacher}{stream}','StreamTeacherController@streamTeacher')->name('stream.teacher');
	Route::post('/student-record','StudentRecordController@studentRecord')->name('student.record');
	//Excel download and imports routes
	Route::get('excel-students','ExportImportStudentController@exportStudents')->name('export.students');
	Route::get('excel-streamstudents/{stream}','ExcelController@exportStreamStudents')->name('export.stream_students');
	Route::get('excel-streamteachers/{stream}','ExcelController@exportStreamTeachers')->name('export.stream_teachers');
	Route::get('excel-schoolteachers','ExcelController@exportSchoolTeachers')->name('export.shool_teachers');
	Route::get('class-excel-marksheet','ExcelController@classResultMarks')->name('class.excelMarksheet');
	Route::get('stream-excel-marksheet','ExcelController@streamResultMarks')->name('stream.excelMarksheet');
	Route::get('streams-report-cards','ExcelController@streamsReportCardsImport')->name('streams.reportCardsForm');
	Route::post('streams-report-cards','ExcelController@streamsReportCardsStore')->name('streams.reportCardStore');
	//Class Marksheet Import routes
	Route::get('marksheet-import-form','ExcelController@marksheetImportForm')->name('marksheet.importForm');
	//Form One Streams Marksheets Import route
	Route::post('streams-marksheets','ExcelController@streamsMarksheets')->name('streams.marksheetsImport');
	//Admin Change Password Routes
	Route::get('/change-password','AdminChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','AdminChangePasswordController@store')->name('change-password.save');
	//Mail Sent Route
	Route::get('mail-form','SendMailController@mailForm')->name('mail.form');
	Route::post('sent-mails','SendMailController@sendMail')->name('send.mail');

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
//Teacher folder routes
Route::prefix('teacher')->name('teacher.')->namespace('Teacher')->group(function(){
	Route::get('/','TeacherController@index')->name('dashboard');
	Route::get('/school-teachers','TeacherController@schoolTeachers')->name('school.teachers');
	Route::get('/details/{teacher}','TeacherController@showTeacher')->name('show');
	Route::get('/streams','TeacherController@streams')->name('streams');
	Route::get('/stream/{stream}','TeacherController@showStream')->name('stream.show');
	Route::get('/show/{student}','TeacherController@showStudent')->name('student');
	Route::get('/departments','TeacherController@departments')->name('departments');
	Route::get('/department/{department}','TeacherController@showDepartment')->name('dept.show');
	Route::get('/awards','TeacherController@teacherRewards')->name('rewards');
	Route::get('/profile','TeacherProfileController@teacherProfile')->name('profile');
    //Downloads routes
    Route::get('timetable/{id}',['as'=>'timetable.download','uses'=>'DownloadTimetableController@dowmloadTimetable']);
	Route::get('assign-download/{id}',['as'=>'assignment.download','uses'=>'DownloadAssignmentController@dowmloadAssignment']);
	Route::get('notes-download/{id}',['as'=>'notes.download','uses'=>'DownloadNotesController@dowmloadNotes']);
	Route::resource('assignments','AssignmentController');
	Route::resource('notes','NotesController');
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
	Route::get('/stream/assignments','StudentController@assignments')->name('stream.assignments');
	Route::get('/stream/students','StudentController@students')->name('stream.students');
	Route::get('/stream/teachers','StudentController@teachers')->name('stream.teachers');
	Route::get('/stream/exams','StudentController@exams')->name('stream.exams');
	Route::get('/club/{id}','StudentController@showClub')->name('club');
	Route::get('/meetings','StudentController@meetings')->name('stream.meetings');
	Route::get('/rewards','StudentController@rewards')->name('stream.rewards');
	Route::get('/stream/subjects','StudentController@streamSubjects')->name('stream.subjects');
	Route::get('/subject/notes/{id}','StudentController@subjectNotes')->name('subject.notes');
	Route::get('/library/books','StudentController@libraryBooks')->name('library.books');
	Route::get('/school/fields','StudentController@schoolFields')->name('school.fields');
	Route::get('/school/halls','StudentController@schoolHalls')->name('school.halls');
	Route::get('/borrowed/books','StudentController@borrowedBooks')->name('borrowed.books');
	Route::get('/profile','StudentProfileController@studentProfile')->name('profile');
    //Downloads routes
    Route::get('timetable/{id}',['as'=>'timetable.download','uses'=>'DownloadTimetableController@dowmloadTimetable']);
	Route::get('examtable/{id}',['as'=>'examtimetable.download','uses'=>'DownloadExamTimetableController@dowmloadExamTimetable']);
	Route::get('assign-download/{id}',['as'=>'assignment.download','uses'=>'DownloadAssignmentController@dowmloadAssignment']);
	Route::get('notes-download/{id}',['as'=>'notes.download','uses'=>'DownloadNotesController@dowmloadNotes']);
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
	Route::get('/students', 'ParentController@parentStudents')->name('students');
	Route::get('/student/{id}', 'ParentController@showStudent')->name('show.student');
	Route::get('/student/stream/{id}', 'ParentController@studentStream')->name('student.stream');
	Route::get('/school-teachers', 'ParentController@schoolTeachers')->name('school.teachers');
	Route::get('/teacher/{id}', 'ParentController@showTeacher')->name('show.teacher');
	//Parent Profile Route
    Route::get('/profile','ParentProfileController@parentProfile')->name('profile');
    //Admin Change Password Routes
	Route::get('/change-password','ParentChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','ParentChangePasswordController@store')->name('change-password.save');
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
	//Accountant Profile Route
    Route::get('/profile','AccountantProfileController@accountantProfile')->name('profile');
    Route::resource('category-fees','CategoryFeeController');
    //Admin Change Password Routes
	Route::get('/change-password','AccountantChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','AccountantChangePasswordController@store')->name('change-password.save');
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
    Route::get('/issued-book-return','PdfController@issuedBooksByReturnDate')->name('issuedbook.returnDate');
    //Excel Download
    Route::get('borrowed-books','ExcelController@exportIssuedBooks')->name('borrowed.excel');
    //Update Issued Book
    Route::post('issued-book/{booker}/return','IssuedBookUpdateController@issuedBookReturned')->name('issuedbook.returned');
    Route::post('issued-book/{booker}/faulty','IssuedBookUpdateController@issuedBookFaulty')->name('issuedbook.faulty');
    Route::post('faulty-book/{booker}/cleared','IssuedBookUpdateController@clearFaultyBook')->name('faultybook.cleared');
    //Librarian Change Password Routes
	Route::get('/change-password','LibrarianChangePasswordController@index')->name('change-password.form');
	Route::post('/change-password','LibrarianChangePasswordController@store')->name('change-password.save');
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
//Attach and Detach class to and from the teacher routes
Route::post('attach-stream/{id}','Teacher\AttachStreamController@attachStream')->name('attach.stream.teacher');
Route::post('detach-stream/{id}','Teacher\DetachStreamController@detachStream')->name('detach.stream.teacher');
//Attach and Detach subject to and from the teacher routes
Route::post('att-subject-teacher/{id}','Teacher\AttachSubjectController@attachSubject')->name('attach.subject.teacher');
Route::post('det-subject-teacher/{id}','Teacher\DetachSubjectController@detachSubject')->name('detach.subject.teacher');
//Attach and Detach teacher to and from the class routes
Route::post('att-teacher-stream/{id}','Stream\AttachTeacherController@attachTeacher')->name('attach.teacher.stream');
Route::post('det-teacher-stream/{id}','Stream\DetachTeacherController@detachTeacher')->name('detach.teacher.stream');
//Attach and Detach subject to and from the student routes
Route::post('att-subject-student/{id}','Student\AttachSubjectController@attachSubject')->name('attach.subject.student');
Route::post('det-subject-student/{id}','Student\DetachSubjectController@detachSubject')->name('detach.subject.student');
//Attach and Detach subject to and from the class routes
Route::post('att-subject-stream/{id}','Stream\AttachSubjectController@attachSubject')->name('attach.subject.stream');
Route::post('det-subject-stream/{id}','Stream\DetachSubjectController@detachSubject')->name('detach.subject.stream');
//Attach and Detach teacher to and from the department routes
Route::post('att-teacher-dept/{id}','Department\AttachTeacherController@attachTeacher')->name('attach.teacher.dept');
Route::post('det-teacher-dept/{id}','Department\DetachTeacherController@detachTeacher')->name('detach.teacher.dept');
//Attach and Detach subordinade staff to and from the department routes
Route::post('att-sustaff-dept/{id}','Department\AttachStaffController@attachStaff')->name('attach.staff.dept');
Route::post('det-sustaff-dept/{id}','Department\DetachStaffController@detachStaff')->name('detach.staff.dept');
//Attach and Detach student to and from the club routes
Route::post('att-student-club/{id}','Club\AttachStudentController@attachStudent')->name('attach.student.club');
Route::post('det-student-club/{id}','Club\DetachStudentController@detachStudent')->name('detach.student.club');
//Attach and Detach teacher to and from the club routes
Route::post('att-teacher-club/{id}','Club\AttachTeacherController@attachTeacher')->name('attach.teacher.club');
Route::post('det-teacher-club/{id}','Club\DetachTeacherController@detachTeacher')->name('detach.teacher.club');
//Attach and Detach Subordinade Staff to and from the club routes
Route::post('att-staff-club/{id}','Club\AttachStaffController@attachStaff')->name('attach.staff.club');
Route::post('det-staff-club/{id}','Club\DetachStaffController@detachStaff')->name('detach.staff.club');
//Attach and Detach an award to and from the student routes
Route::post('att-reward-student/{id}','Student\AttachRewardController@attachReward')->name('attach.reward.student');
Route::post('det-reward-student/{id}','Student\DetachRewardController@detachReward')->name('detach.reward.student');
//Attach and Detach an assignment to and from the student routes
Route::post('att-assign-student/{id}','Student\AttachAssignmentController@attachAssignment')->name('attach.assign.student');
Route::post('det-assign-student/{id}','Student\DetachAssignmentController@detachAssignment')->name('detach.assign.student');
//Attach and Detach an assignment to and from the class routes
Route::post('att-assign-stream/{id}','Stream\AttachAssignmentController@attachAssignment')->name('attach.assign.stream');
Route::post('det-assign-stream/{id}','Stream\DetachAssignmentController@detachAssignment')->name('detach.assign.stream');
//Attach and Detach an assignment to and from the teacher routes
Route::post('att-assign-teacher/{id}','Teacher\AttachAssignmentController@attachAssignment')->name('attach.assign.teacher');
Route::post('det-assign-teacher/{id}','Teacher\DetachAssignmentController@detachAssignment')->name('detach.assign.teacher');
//Attach and Detach student to and from the assignment routes
Route::post('att-student-assign/{id}','Assignment\AttachStudentController@attachStudent')->name('attach.student.assignment');
Route::post('det-student-assign/{id}','Assignment\DetachStudentController@detachStudent')->name('detach.student.assignment');
//Attach and Detach subject to and from the exam routes
Route::post('att-subject-exam/{id}','Exam\AttachSubjectController@attachSubject')->name('attach.subject.exam');
Route::post('det-subject-exam/{id}','Exam\DetachSubjectController@detachSubject')->name('detach.subject.exam');
//Attach and Detach an exam to and from the class routes
Route::post('att-exam-stream/{id}','Stream\AttachExamController@attachExam')->name('attach.exam.stream');
Route::post('det-exam-stream/{id}','Stream\DetachExamController@detachExam')->name('detach.exam.stream');
//Attach and Detach meeting to and from the department routes
Route::post('att-meeting-dept/{id}','Department\AttachMeetingController@attachMeeting')->name('attach.meeting.dept');
Route::post('det-meeting-dept/{id}','Department\DetachMeetingController@detachMeeting')->name('detach.meeting.dept');
//Attach and Detach meeting to and from the class routes
Route::post('att-meeting-stream/{id}','Stream\AttachMeetingController@attachMeeting')->name('attach.meeting.stream');
Route::post('det-meeting-stream/{id}','Stream\DetachMeetingController@detachMeeting')->name('detach.meeting.stream');
//Attach and Detach meeting to and from the dormitory routes
Route::post('att-meeting-dom/{id}','Dormitory\AttachMeetingController@attachMeeting')->name('attach.meeting.dom');
Route::post('det-meeting-dom/{id}','Dormitory\DetachMeetingController@detachMeeting')->name('detach.meeting.dom');
//Attach and Detach meeting to and from the library routes
Route::post('att-meeting-lib/{id}','Library\AttachMeetingController@attachMeeting')->name('attach.meeting.lib');
Route::post('det-meeting-lib/{id}','Library\DetachMeetingController@detachMeeting')->name('detach.meeting.lib');
//Attach and Detach meeting to and from the club routes
Route::post('att-meeting-club/{id}','Club\AttachMeetingController@attachMeeting')->name('attach.meeting.club');
Route::post('det-meeting-club/{id}','Club\DetachMeetingController@detachMeeting')->name('detach.meeting.club');
//Attach and Detach teacher to and from the meeting routes
Route::post('att-teacher-meeting/{id}','Meeting\AttachTeacherController@attachTeacher')->name('attach.teacher.meeting');
Route::post('det-teacher-meeting/{id}','Meeting\DetachTeacherController@detachTeacher')->name('detach.teacher.meeting');
//Attach and Detach student to and from the meeting routes
Route::post('att-student-meeting/{id}','Meeting\AttachStudentController@attachStudent')->name('attach.student.meeting');
Route::post('det-student-meeting/{id}','Meeting\DetachStudentController@detachStudent')->name('detach.student.meeting');
//Attach and Detach subordinade staff to and from the meeting routes
Route::post('att-staff-meeting/{id}','Meeting\AttachStaffController@attachStaff')->name('attach.staff.meeting');
Route::post('det-staff-meeting/{id}','Meeting\DetachStaffController@detachStaff')->name('detach.staff.meeting');
//Attach and Detach an award to and from the class routes
Route::post('att-reward-stream/{id}','Stream\AttachRewardController@attachReward')->name('attach.reward.stream');
Route::post('det-reward-stream/{id}','Stream\DetachRewardController@detachReward')->name('detach.reward.stream');
//Attach and Detach an award to and from the teacher routes
Route::post('att-reward-teacher/{id}','Teacher\AttachRewardController@attachReward')->name('attach.reward.teacher');
Route::post('det-reward-teacher/{id}','Teacher\DetachRewardController@detachReward')->name('detach.reward.teacher');
//Attach and Detach meeting to and from the student routes
Route::post('att-meeting-student/{id}','Student\AttachMeetingController@attachMeeting')->name('attach.meeting.student');
Route::post('det-meeting-student/{id}','Student\DetachMeetingController@detachMeeting')->name('detach.meeting.student');
//Attach and Detach class to and from the meeting routes
Route::post('att-std-meeting/{id}','Meeting\AttachStreamController@attachStream')->name('attach.stream.meeting');
Route::post('det-std-meeting/{id}','Meeting\DetachStreamController@detachStream')->name('detach.stream.meeting');
}); //END OF PREVENT BACK HISTORY ROUTE MIDDLEWARE