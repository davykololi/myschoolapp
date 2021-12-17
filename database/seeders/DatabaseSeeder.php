<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SuperadminTableSeeder::class);
        $this->call(SchoolCategoryTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(BloodGroupTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(YearTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(TermTableSeeder::class);
        $this->call(IntakeTableSeeder::class);
        $this->call(TeacherRoleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(StreamSectionTableSeeder::class);
        $this->call(StreamTableSeeder::class);
        $this->call(ExamCategoryTableSeeder::class);
        $this->call(ExamTableSeeder::class);
        $this->call(ParentTableSeeder::class);
        $this->call(DormitoryTableSeeder::class);
        $this->call(StudentRoleTableSeeder::class);
        $this->call(StudentTableSeeder::class);
    }
}
