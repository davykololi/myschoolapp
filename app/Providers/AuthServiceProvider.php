<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Stream;
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
        Gate::define('studentRegistrar',function(User $user){
            return $user->admin->studentRegistrar();
        });

        /* define an admin user role */
        Gate::define('academicRegistrar',function(User $user){
            return $user->admin->academicRegistrar();
        });

        /* define an admin user role */
        Gate::define('examRegistrar',function(User $user){
            return $user->admin->examRegistrar();
        });

        /* define an admin user role */
        Gate::define('seniorAdmin',function(User $user){
            return $user->admin->seniorAdmin();
        });

        /* define an admin user role */
        Gate::define('deputySeniorAdmin',function(User $user){
            return $user->admin->deputySeniorAdmin();
        });

        /* define an admin user role */
        Gate::define('ordinaryAdmin',function(User $user){
            return $user->admin->ordinaryAdmin();
        });

        /* define an admin user role */
        Gate::define('accountsAdmin',function(User $user){
            return $user->admin->accountsAdmin();
        });

        /* define an admin user role */
        Gate::define('libraryAdmin',function(User $user){
            return $user->admin->libraryAdmin();
        });

        /* define an admin user role */
        Gate::define('dataOfficer',function(User $user){
            return $user->admin->dataOfficer();
        });

        Gate::define('create-article', function (User $user, Article $article) {
            return $user->id === $article->user_id;
        });

        Gate::define('edit-article', function (User $user) {
            return $user->role === UserRoleEnum::Editor;
        });

        /* define an senior accountant role */
        Gate::define('seniorAccountant',function(User $user){
            return $user->accountant->seniorAccountant();
        });

        /* define an deputy senior accountant role */
        Gate::define('deputySeniorAccountant',function(User $user){
            return $user->accountant->deputySeniorAccountant();
        });

        /* define an accounts auditor role */
        Gate::define('accountsAuditor',function(User $user){
            return $user->accountant->accountsAuditor();
        });

        /* define an audinary accountant role */
        Gate::define('ordinaryAccountant',function(User $user){
            return $user->accountant->ordinaryAccountant();
        });

        /* define staff teacher role */
        Gate::define('staffTeacher',function(User $user){
            return $user->teacher->staffTeacher();
        });

        /* define class teacher role */
        Gate::define('classTeacher',function(User $user){
            return $user->teacher->classTeacher();
        });

        /* define head teacher role */
        Gate::define('headTeacher',function(User $user){
            return $user->teacher->headTeacher();
        });

        /* define deputy head teacher role */
        Gate::define('deputyHeadTeacher',function(User $user){
            return $user->teacher->deputyHeadTeacher();
        });

        /* define head science department role */
        Gate::define('headScienceDept',function(User $user){
            return $user->teacher->headScienceDept();
        });

        /* define assistant head science department role */
        Gate::define('assistantHeadScienceDept',function(User $user){
            return $user->teacher->assistantHeadScienceDept();
        });

        /* define head humanity department role */
        Gate::define('headHumanityDept',function(User $user){
            return $user->teacher->headHumanityDept();
        });

        /* define assistant head humanity department role */
        Gate::define('assistantHeadHumanityDept',function(User $user){
            return $user->teacher->assistantHeadHumanityDept();
        });

        /* define head maths department role */
        Gate::define('headMathsDept',function(User $user){
            return $user->teacher->headMathsDept();
        });

        /* define assistant head maths department role */
        Gate::define('assistantHeadMathsDept',function(User $user){
            return $user->teacher->assistantHeadMathsDept();
        });

        /* define head languages department role */
        Gate::define('headLanguagesDept',function(User $user){
            return $user->teacher->headLanguagesDept();
        });

        /* define assistant head languages department role */
        Gate::define('assistantHeadLanguagesDept',function(User $user){
            return $user->teacher->assistantHeadLanguagesDept();
        });

        /* STUDENTS ROLES */
        /* define student leader role */
        Gate::define('studentLeader',function(User $user){
            return $user->student->schoolStudentLeader();
        });

        /* define deputy student leader role */
        Gate::define('deputyStudentLeader',function(User $user){
            return $user->student->assSchoolStudentLeader();
        });

        /* define ordinary student role */
        Gate::define('ordinaryStudent',function(User $user){
            return $user->student->ordinaryStudent();
        });

        /* define stream prefect role */
        Gate::define('streamPrefect',function(User $user){
            return $user->student->streamPrefect();
        });

        /* define assistant stream prefect role */
        Gate::define('assistantStreamPrefect',function(User $user){
            return $user->student->assistantStreamPrefect();
        });

        /* define time keeper role */
        Gate::define('timeKeeper',function(User $user){
            return $user->student->timeKeeper();
        });

        /* SUBORDINATE STAFF ROLES */
        /* define school secretary role */
        Gate::define('schoolSecretary',function(User $user){
            return $user->subordinate->schoolSecretary();
        });

        /* define senior cook role */
        Gate::define('seniorCook',function(User $user){
            return $user->subordinate->seniorCook();
        });

        /* define ordinary cook role */
        Gate::define('ordinaryCook',function(User $user){
            return $user->subordinate->ordinaryCook();
        });

        /* define senior security role */
        Gate::define('seniorSecurity',function(User $user){
            return $user->subordinate->seniorSecurity();
        });

        /* define ordinary security role */
        Gate::define('ordinarySecurity',function(User $user){
            return $user->subordinate->ordinarySecurity();
        });

        /* define school gardener role */
        Gate::define('schoolGardener',function(User $user){
            return $user->subordinate->schoolGardener();
        });

        /* define school electrician role */
        Gate::define('schoolElectrician',function(User $user){
            return $user->subordinate->schoolElectrician();
        });

        /* define tea server role */
        Gate::define('teaServer',function(User $user){
            return $user->subordinate->teaServer();
        });

        /* LIBRARIAN ROLES */
        /* define senior librarian role */
        Gate::define('seniorLibrarian',function(User $user){
            return $user->librarian->seniorLibrarian();
        });

        /* define assistant senior librarian role */
        Gate::define('assistantSeniorLibrarian',function(User $user){
            return $user->librarian->assistantSeniorLibrarian();
        });

        /* define library auditor role */
        Gate::define('libraryAuditor',function(User $user){
            return $user->librarian->libraryAuditor();
        });

        /* define ordinary librarian role */
        Gate::define('ordinaryLibrarian',function(User $user){
            return $user->librarian->ordinaryLibrarian();
        });

        /* define stream head teacher */
        Gate::define('streamHeadTeacher',function(User $user,Stream $stream){
            return $user->full_name === $stream->class_teacher;
        });
    }
}
