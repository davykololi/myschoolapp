<?php

namespace App\Providers;

use App\Interfaces\StudentInterface;
use App\Repositories\StudentRepository;
use App\Interfaces\StreamInterface;
use App\Repositories\StreamRepository;
use App\Interfaces\ClassInterface;
use App\Repositories\ClassRepository;
use App\Interfaces\ParentInterface;
use App\Repositories\ParentRepository;
use App\Interfaces\SubjectInterface;
use App\Repositories\SubjectRepository;
use App\Interfaces\TeacherInterface;
use App\Repositories\TeacherRepository;
use App\Interfaces\DepartmentInterface;
use App\Repositories\DepartmentRepository;
use App\Interfaces\LibrarianInterface;
use App\Repositories\LibrarianRepository;
use App\Interfaces\SchCatInterface;
use App\Repositories\SchCatRepository;
use App\Interfaces\SchoolInterface;
use App\Repositories\SchoolRepository;
use App\Interfaces\StreamSecInterface;
use App\Repositories\StreamSecRepository;
use App\Interfaces\YearInterface;
use App\Repositories\YearRepository;
use App\Interfaces\TermInterface;
use App\Repositories\TermRepository;
use App\Interfaces\TeacherRoleInterface;
use App\Repositories\TeacherRoleRepository;
use App\Interfaces\LibrarianRoleInterface;
use App\Repositories\LibrarianRoleRepository;
use App\Interfaces\AccountantRoleInterface;
use App\Repositories\AccountantRoleRepository;
use App\Interfaces\MatronRoleInterface;
use App\Repositories\MatronRoleRepository;
use App\Interfaces\AdminInterface;
use App\Repositories\AdminRepository;
use App\Interfaces\AccountantInterface;
use App\Repositories\AccountantRepository;
use App\Interfaces\MatronInterface;
use App\Repositories\MatronRepository;
use App\Interfaces\IntakeInterface;
use App\Repositories\IntakeRepository;
use App\Interfaces\DormitoryInterface;
use App\Repositories\DormitoryRepository;
use App\Interfaces\LibraryInterface;
use App\Repositories\LibraryRepository;
use App\Interfaces\StudentRoleInterface;
use App\Repositories\StudentRoleRepository;
use App\Interfaces\StaffRoleInterface;
use App\Repositories\StaffRoleRepository;
use App\Interfaces\SubjectCatInterface;
use App\Repositories\SubjectCatRepository;
use App\Interfaces\ExamCatInterface;
use App\Repositories\ExamCatRepository;
use App\Interfaces\FieldCatInterface;
use App\Repositories\FieldCatRepository;
use App\Interfaces\GameCatInterface;
use App\Repositories\GameCatRepository;
use App\Interfaces\HallCatInterface;
use App\Repositories\HallCatRepository;
use App\Interfaces\FarmCatInterface;
use App\Repositories\FarmCatRepository;
use App\Interfaces\FieldInterface;
use App\Repositories\FieldRepository;
use App\Interfaces\GameInterface;
use App\Repositories\GameRepository;
use App\Interfaces\FarmInterface;
use App\Repositories\FarmRepository;
use App\Interfaces\StdSubjectInterface;
use App\Repositories\StdSubjectRepository;
use App\Interfaces\StaffInterface;
use App\Repositories\StaffRepository;
use App\Interfaces\ClubInterface;
use App\Repositories\ClubRepository;
use App\Interfaces\AssignmentInterface;
use App\Repositories\AssignmentRepository;
use App\Interfaces\ExamInterface;
use App\Repositories\ExamRepository;
use App\Interfaces\MeetingInterface;
use App\Repositories\MeetingRepository;
use App\Interfaces\RewardInterface;
use App\Repositories\RewardRepository;
use App\Interfaces\HallInterface;
use App\Repositories\HallRepository;
use App\Interfaces\TimetableInterface;
use App\Repositories\TimetableRepository;
use App\Interfaces\NotesInterface;
use App\Repositories\NotesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(StudentInterface::class,StudentRepository::class);
        $this->app->bind(StreamInterface::class,StreamRepository::class);
        $this->app->bind(ClassInterface::class,ClassRepository::class);
        $this->app->bind(ParentInterface::class,ParentRepository::class);
        $this->app->bind(SubjectInterface::class,SubjectRepository::class);
        $this->app->bind(TeacherInterface::class,TeacherRepository::class);
        $this->app->bind(DepartmentInterface::class,DepartmentRepository::class);
        $this->app->bind(LibrarianInterface::class,LibrarianRepository::class);
        $this->app->bind(SchCatInterface::class,SchCatRepository::class);
        $this->app->bind(SchoolInterface::class,SchoolRepository::class);
        $this->app->bind(StreamSecInterface::class,StreamSecRepository::class);
        $this->app->bind(YearInterface::class,YearRepository::class);
        $this->app->bind(TermInterface::class,TermRepository::class);
        $this->app->bind(TeacherRoleInterface::class,TeacherRoleRepository::class);
        $this->app->bind(LibrarianRoleInterface::class,LibrarianRoleRepository::class);
        $this->app->bind(AccountantRoleInterface::class,AccountantRoleRepository::class);
        $this->app->bind(MatronRoleInterface::class,MatronRoleRepository::class);
        $this->app->bind(AdminInterface::class,AdminRepository::class);
        $this->app->bind(AccountantInterface::class,AccountantRepository::class);
        $this->app->bind(MatronInterface::class,MatronRepository::class);
        $this->app->bind(IntakeInterface::class,IntakeRepository::class);
        $this->app->bind(DormitoryInterface::class,DormitoryRepository::class);
        $this->app->bind(LibraryInterface::class,LibraryRepository::class);
        $this->app->bind(StudentRoleInterface::class,StudentRoleRepository::class);
        $this->app->bind(StaffRoleInterface::class,StaffRoleRepository::class);
        $this->app->bind(SubjectCatInterface::class,SubjectCatRepository::class);
        $this->app->bind(ExamCatInterface::class,ExamCatRepository::class);
        $this->app->bind(FieldCatInterface::class,FieldCatRepository::class);
        $this->app->bind(GameCatInterface::class,GameCatRepository::class);
        $this->app->bind(HallCatInterface::class,HallCatRepository::class);
        $this->app->bind(FarmCatInterface::class,FarmCatRepository::class);
        $this->app->bind(FieldInterface::class,FieldRepository::class);
        $this->app->bind(GameInterface::class,GameRepository::class);
        $this->app->bind(FarmInterface::class,FarmRepository::class);
        $this->app->bind(StdSubjectInterface::class,StdSubjectRepository::class);
        $this->app->bind(StaffInterface::class,StaffRepository::class);
        $this->app->bind(ClubInterface::class,ClubRepository::class);
        $this->app->bind(AssignmentInterface::class,AssignmentRepository::class);
        $this->app->bind(ExamInterface::class,ExamRepository::class);
        $this->app->bind(MeetingInterface::class,MeetingRepository::class);
        $this->app->bind(RewardInterface::class,RewardRepository::class);
        $this->app->bind(HallInterface::class,HallRepository::class);
        $this->app->bind(TimetableInterface::class,TimetableRepository::class);
        $this->app->bind(NotesInterface::class,NotesRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
