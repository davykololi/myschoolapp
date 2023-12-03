<?php

namespace App\Providers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Admin;
use App\Models\Accountant;
use App\Models\Staff;
use App\Models\Librarian;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        /* define an admin user role */
        Gate::define('studentRegistrar',function(Admin $admin){
            return $admin->studentRegistrar();
        });

        /* define an editor user role */
        Gate::define('academicRegistrar',function(Admin $admin){
            return $admin->academicRegistrar();
        });

        /* define an editor user role */
        Gate::define('examRegistrar',function(Admin $admin){
            return $admin->examRegistrar();
        });

        /* define an admin user role */
        Gate::define('seniorAdmin',function(Admin $admin){
            return $admin->seniorAdmin();
        });

        /* define an admin user role */
        Gate::define('deputySeniorAdmin',function(Admin $admin){
            return $admin->deputySeniorAdmin();
        });

        /* define an admin user role */
        Gate::define('ordinaryAdmin',function(Admin $admin){
            return $admin->ordinaryAdmin();
        });

        Gate::define('create-article', function (User $user, Article $article) {
            return $user->id === $article->user_id;
        });

        Gate::define('edit-article', function (User $user) {
            return $user->role === UserRoleEnum::Editor;
        });

        /* define an senior accountant role */
        Gate::define('seniorAccountant',function(Accountant $accountant){
            return $accountant->seniorAccountant();
        });

        /* define an deputy senior accountant role */
        Gate::define('deputySeniorAccountant',function(Accountant $accountant){
            return $accountant->deputySeniorAccountant();
        });

        /* define an accounts auditor role */
        Gate::define('accountsAuditor',function(Accountant $accountant){
            return $accountant->accountsAuditor();
        });

        /* define an audinary accountant role */
        Gate::define('ordinaryAccountant',function(Accountant $accountant){
            return $accountant->ordinaryAccountant();
        });

        /* define staff teacher role */
        Gate::define('staffTeacher',function(Teacher $teacher){
            return $teacher->staffTeacher();
        });

        /* define class teacher role */
        Gate::define('classTeacher',function(Teacher $teacher){
            return $teacher->classTeacher();
        });

        /* define head teacher role */
        Gate::define('headTeacher',function(Teacher $teacher){
            return $teacher->headTeacher();
        });

        /* define deputy head teacher role */
        Gate::define('deputyHeadTeacher',function(Teacher $teacher){
            return $teacher->deputyHeadTeacher();
        });

        /* define head science department role */
        Gate::define('headScienceDept',function(Teacher $teacher){
            return $teacher->headScienceDept();
        });

        /* define assistant head science department role */
        Gate::define('assistantHeadScienceDept',function(Teacher $teacher){
            return $teacher->assistantHeadScienceDept();
        });

        /* define head humanity department role */
        Gate::define('headHumanityDept',function(Teacher $teacher){
            return $teacher->headHumanityDept();
        });

        /* define assistant head humanity department role */
        Gate::define('assistantHeadHumanityDept',function(Teacher $teacher){
            return $teacher->assistantHeadHumanityDept();
        });

        /* define head maths department role */
        Gate::define('headMathsDept',function(Teacher $teacher){
            return $teacher->headMathsDept();
        });

        /* define assistant head maths department role */
        Gate::define('assistantHeadMathsDept',function(Teacher $teacher){
            return $teacher->assistantHeadMathsDept();
        });

        /* define head languages department role */
        Gate::define('headLanguagesDept',function(Teacher $teacher){
            return $teacher->headLanguagesDept();
        });

        /* define assistant head languages department role */
        Gate::define('assistantHeadLanguagesDept',function(Teacher $teacher){
            return $teacher->assistantHeadLanguagesDept();
        });

        /* STUDENTS ROLES */
        /* define student leader role */
        Gate::define('studentLeader',function(Student $student){
            return $student->schoolStudentLeader();
        });

        /* define deputy student leader role */
        Gate::define('deputyStudentLeader',function(Student $student){
            return $student->assSchoolStudentLeader();
        });

        /* define ordinary student role */
        Gate::define('ordinaryStudent',function(Student $student){
            return $student->ordinaryStudent();
        });

        /* define stream prefect role */
        Gate::define('streamPrefect',function(Student $student){
            return $student->streamPrefect();
        });

        /* define assistant stream prefect role */
        Gate::define('assistantStreamPrefect',function(Student $student){
            return $student->assistantStreamPrefect();
        });

        /* define time keeper role */
        Gate::define('timeKeeper',function(Student $student){
            return $student->timeKeeper();
        });

        /* SUB STAFF ROLES */
        /* define school secretary role */
        Gate::define('schoolSecretary',function(Staff $staff){
            return $staff->schoolSecretary();
        });

        /* define senior cook role */
        Gate::define('seniorCook',function(Staff $staff){
            return $staff->seniorCook();
        });

        /* define ordinary cook role */
        Gate::define('ordinaryCook',function(Staff $staff){
            return $staff->ordinaryCook();
        });

        /* define senior security role */
        Gate::define('seniorSecurity',function(Staff $staff){
            return $staff->seniorSecurity();
        });

        /* define ordinary security role */
        Gate::define('ordinarySecurity',function(Staff $staff){
            return $staff->ordinarySecurity();
        });

        /* define school gardener role */
        Gate::define('schoolGardener',function(Staff $staff){
            return $staff->schoolGardener();
        });

        /* define school electrician role */
        Gate::define('schoolElectrician',function(Staff $staff){
            return $staff->schoolElectrician();
        });

        /* define tea server role */
        Gate::define('teaServer',function(Staff $staff){
            return $staff->teaServer();
        });

        /* LIBRARIAN ROLES */
        /* define senior librarian role */
        Gate::define('seniorLibrarian',function(Librarian $librarian){
            return $librarian->seniorLibrarian();
        });

        /* define assistant senior librarian role */
        Gate::define('assistantSeniorLibrarian',function(Librarian $librarian){
            return $librarian->assistantSeniorLibrarian();
        });

        /* define library auditor role */
        Gate::define('libraryAuditor',function(Librarian $librarian){
            return $librarian->libraryAuditor();
        });

        /* define ordinary librarian role */
        Gate::define('ordinaryLibrarian',function(Librarian $librarian){
            return $librarian->ordinaryLibrarian();
        });
    }
}
