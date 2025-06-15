<?php

namespace Database\Seeders;

use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Superadmin;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\MyParent;
use App\Models\Student;
use App\Models\Accountant;
use App\Models\Matron;
use App\Models\Librarian;
use App\Models\Subordinate;
use App\Models\School;
use App\Models\Myclass;
use App\Models\StreamSection;
use App\Models\Stream;
use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Intake;
use App\Models\Dormitory;
use App\Models\DepartmentSection;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $this->call(RolesAndPermissionsSeeder::class);

        $school1 = School::create([
            'name' => 'Lizar Schools Naivasha',
            'type' => 'Private School',
            'initials' => 'LSN',
            'code' => strtoupper(Str::random(15)),
            'head' => 'Mr. Welton Kisaju Mwadime',
            'ass_head' => 'Mrs. Melvin Awori Omollo',
            'motto' => 'In Fearing God, Wisdom Begins',
            'vision' => 'To provide the best education to our students',
            'mission' => 'To be the best learning institution in Kenya',
            'email' => 'lizarac@gmail.com',
            'phone_no' => '+254724907865',
            'postal_address' => 'P.O Box 67099, Naivasha',
            'core_values' => 'N/A',
            'image' => 'image.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $year1 = Year::create([
            'year' => '2023',
            'desc' => 'The year 2023',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $year2 = Year::create([
            'year' => '2024',
            'desc' => 'The year 2024',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $year3 = Year::create([
            'year' => '2025',
            'desc' => 'The year 2025',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        $class1 = Myclass::create([
            'name'  => 'Form One',
            'initials' => 'F1',
            'desc' => 'Form One classes',
            'slug' => Str::slug('Form One','-'),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $class2 = Myclass::create([
            'name'  => 'Form Two',
            'initials' => 'F2',
            'desc' => 'Form Two classes',
            'slug' => Str::slug('Form Two','-'),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $class3 = Myclass::create([
            'name'  => 'Form Three',
            'initials' => 'F3',
            'desc' => 'Form Three classes',
            'slug' => Str::slug('Form Three','-'),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $class4 = Myclass::create([
            'name'  => 'Form Four',
            'initials' => 'F4',
            'desc' => 'Form Four classes',
            'slug' => Str::slug('Form Four','-'),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $term1 = Term::create([
            'name' => 'Term One',
            'code' => strtoupper(Str::random(15)),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $term2 = Term::create([
            'name' => 'Term Two',
            'code' => strtoupper(Str::random(15)),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $term3 = Term::create([
            'name' => 'Term Three',
            'code' => strtoupper(Str::random(15)),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        $intake1 = Intake::create([
            'name' => 'March Intake',
            'desc' => 'The intake for the month of March',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $intake2 = Intake::create([
            'name' => 'September Intake',
            'desc' => 'The intake for the month of September',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $deptSection1 = DepartmentSection::create([
            'name' => 'Academic',
            'description' => 'The academic department section',
            'code' => strtoupper(Str::random(15)),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $deptSection2 = DepartmentSection::create([
            'name' => 'Special',
            'description' => 'The special department section',
            'code' => strtoupper(Str::random(15)),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $deptSection3 = DepartmentSection::create([
            'name' => 'Sports',
            'description' => 'The sports department section',
            'code' => strtoupper(Str::random(15)),
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        $dept1 = Department::create([
            'name' => 'Science Department',
            'code' => strtoupper(Str::random(15)),
            'phone_no' => '0756453278',
            'head_name' => 'Mr. Cleophas Malala',
            'asshead_name' => 'Mrs. Glady Sholei',
            'motto' => 'The world needs science in every aspect',
            'vision' => 'To impact the best science knowlegde to our students',
            'mission' => 'to be the leading institution in science in Kenya',
            'department_section_id' => $deptSection1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $dept2 = Department::create([
            'name' => 'Languages Department',
            'code' => strtoupper(Str::random(15)),
            'phone_no' => '0756453278',
            'head_name' => 'Mr. Granton Samboja',
            'asshead_name' => 'Mr. Alfred Keter',
            'motto' => 'The languages unite the world',
            'vision' => 'To provide the best languages experiences to our students',
            'mission' => 'to be the leading institution in languages in Kenya',
            'department_section_id' => $deptSection1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $dept3 = Department::create([
            'name' => 'Mathematics Department',
            'code' => strtoupper(Str::random(15)),
            'phone_no' => '0745678883',
            'head_name' => 'Mr. James Waliaula',
            'asshead_name' => 'Mrs. Jane Wabwoba',
            'motto' => 'Mathematics Rotates The World',
            'vision' => 'To provide the best mathematical knowledge to our learners',
            'mission' => 'To be the best institution offering mathematics education in Kenya',
            'department_section_id' => $deptSection1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $dept4 = Department::create([
            'name' => 'Humanities Department',
            'code' => strtoupper(Str::random(15)),
            'phone_no' => '0729887654',
            'head_name' => 'Mr. Ken Walibora',
            'asshead_name' => 'Mr. Jackson Kawawa',
            'motto' => 'Humanity To All',
            'vision' => 'To provide the best Humanity knowledge to our learners',
            'mission' => 'To be the best institution offering humanities education in Kenya',
            'department_section_id' => $deptSection1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $dept5 = Department::create([
            'name' => 'Religious Department',
            'code' => strtoupper(Str::random(15)),
            'phone_no' => '0745896754',
            'head_name' => 'Mr. Justus Keya',
            'asshead_name' => 'Mr. Cleophas Wanjohi',
            'motto' => 'God Is Good All The Time, And All The Time God Is Good',
            'vision' => 'To provide the best regious teachings to our learners',
            'mission' => 'To be the best institution offering religious education in Kenya',
            'department_section_id' => $deptSection1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        $streamSection1 = StreamSection::create([
            'name' => 'North',
            'desc' => 'The north stream classes',
            'initials' => 'N',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $streamSection2 = StreamSection::create([
            'name' => 'South',
            'desc' => 'The south stream classes',
            'initials' => 'S',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $streamSection3 = StreamSection::create([
            'name' => 'West',
            'desc' => 'The west stream classes',
            'initials' => 'W',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $streamSection4 = StreamSection::create([
            'name' => 'East',
            'desc' => 'The east stream classes',
            'initials' => 'E',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream1 = Stream::create([
            'name' => 'Form One North',
            'class_teacher' => 'Mrs. Irene Aoko Auma',
            'class_prefect' => 'Antony Karanja Macho',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection1->id,
            'school_id' => $school1->id,
            'class_id' => $class1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream2 = Stream::create([
            'name' => 'Form One South',
            'class_teacher' => 'Mr. Julius Juma Kisilu',
            'class_prefect' => 'Moses Pinto Asili',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection2->id,
            'school_id' => $school1->id,
            'class_id' => $class1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream3 = Stream::create([
            'name' => 'Form One West',
            'class_teacher' => 'Mrs. Glady Nafula Barasa',
            'class_prefect' => 'Adelaide Wafula Juma',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection3->id,
            'school_id' => $school1->id,
            'class_id' => $class1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream4 = Stream::create([
            'name' => 'Form One East',
            'class_teacher' => 'Mr. Bramuel Mwasi Juma',
            'class_prefect' => 'Linda Nafula Barasa',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection4->id,
            'school_id' => $school1->id,
            'class_id' => $class1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream5 = Stream::create([
            'name' => 'Form Two North',
            'class_teacher' => 'Mr. Jesse Dominick Mwambulu',
            'class_prefect' => 'Pinto Mwamuzi Muli',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection1->id,
            'school_id' => $school1->id,
            'class_id' => $class2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream6 = Stream::create([
            'name' => 'Form Two South',
            'class_teacher' => 'Mr. Cleophas Kamau Kombo',
            'class_prefect' => 'George Wamusili Kinda',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection2->id,
            'school_id' => $school1->id,
            'class_id' => $class2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream7 = Stream::create([
            'name' => 'Form Two West',
            'class_teacher' => 'Mrs. Annet Maimuna Mukasa',
            'class_prefect' => 'Hellen Esha Wafula',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection3->id,
            'school_id' => $school1->id,
            'class_id' => $class2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $stream8 = Stream::create([
            'name' => 'Form Two East',
            'class_teacher' => 'Mrs. Phanice Nanyama Mulongo',
            'class_prefect' => 'Jane Maimuna Kizito',
            'code' => strtoupper(Str::random(15)),
            'stream_section_id' => $streamSection4->id,
            'school_id' => $school1->id,
            'class_id' => $class2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $exam1 = Exam::create([
            'name' => 'Mid Term Exam',
            'initials' => 'MTEXM',
            'type' => 'Mid Term Examinations',
            'code' => strtoupper(Str::random(15)),
            'start_date' => '12/06/2025',
            'end_date' => '20/06/2025',
            'school_id' => $school1->id,
            'year_id' => $year3->id,
            'term_id' => $term2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $exam2 = Exam::create([
            'name' => 'End Term Exam',
            'initials' => 'ETEXM',
            'type' => 'End Term Examinations',
            'code' => strtoupper(Str::random(15)),
            'start_date' => '09/07/2025',
            'end_date' => '17/07/2025',
            'school_id' => $school1->id,
            'year_id' => $year3->id,
            'term_id' => $term2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $exam3 = Exam::create([
            'name' => 'Mock Exam',
            'initials' => 'MOCKEXM',
            'type' => 'Mock Examinations',
            'code' => strtoupper(Str::random(15)),
            'start_date' => '15/08/2025',
            'end_date' => '24/08/2025',
            'school_id' => $school1->id,
            'year_id' => $year3->id,
            'term_id' => $term2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        $dormitory1 = Dormitory::create([
            'name' => 'Mt. Elgon',
            'code' => strtoupper(Str::random(15)),
            'bed_no' => 78,
            'dom_head' => 'Mrs. Jane Kansime',
            'ass_head' => 'Mrs. Anne Wanjiru',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $dormitory2 = Dormitory::create([
            'name' => 'Mt. Kilimanjaro',
            'code' => strtoupper(Str::random(15)),
            'bed_no' => 85,
            'dom_head' => 'Mrs. Melvina Wafula',
            'ass_head' => 'Mrs. Janet Wetah',
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject1 = Subject::create([
            'name'  => 'Mathematics',
            'type' => 'Compulsary',
            'code' => '121',
            'department_id' => $dept3->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject2 = Subject::create([
            'name'  => 'English',
            'type' => 'Languages',
            'code' => '101',
            'department_id' => $dept2->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject3 = Subject::create([
            'name'  => 'Kiswahili',
            'type' => 'Languages',
            'code' => '102',
            'department_id' => $dept2->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject4 = Subject::create([
            'name'  => 'Chemistry',
            'type' => 'Sciences',
            'code' => '233',
            'department_id' => $dept1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject5 = Subject::create([
            'name'  => 'Biology',
            'type' => 'Sciences',
            'code' => '231',
            'department_id' => $dept1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject6 = Subject::create([
            'name'  => 'Physics',
            'type' => 'Sciences',
            'code' => '232',
            'department_id' => $dept1->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject7 = Subject::create([
            'name'  => 'CRE',
            'type' => 'Humanities',
            'code' => '313',
            'department_id' => $dept5->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject8 = Subject::create([
            'name'  => 'Islam',
            'type' => 'Humanities',
            'code' => '314',
            'department_id' => $dept5->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject9 = Subject::create([
            'name'  => 'Geography',
            'type' => 'Humanities',
            'code' => '312',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject10 = Subject::create([
            'name'  => 'History And Government',
            'type' => 'Humanities',
            'code' => '311',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject11 = Subject::create([
            'name'  => 'Home Science',
            'type' => 'Technical',
            'code' => '441',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject12 = Subject::create([
            'name'  => 'Art And Design',
            'type' => 'Technical',
            'code' => '442',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject13 = Subject::create([
            'name'  => 'Agriculture',
            'type' => 'Technical',
            'code' => '443',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject14 = Subject::create([
            'name'  => 'Business Studies',
            'type' => 'Technical',
            'code' => '565',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject15 = Subject::create([
            'name'  => 'Computer Studies',
            'type' => 'Technical',
            'code' => '451',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject16 = Subject::create([
            'name'  => 'Drawing And Design',
            'type' => 'Technical',
            'code' => '449',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject17 = Subject::create([
            'name'  => 'French',
            'type' => 'Foreign Languages',
            'code' => '501',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject18 = Subject::create([
            'name'  => 'German',
            'type' => 'Foreign Languages',
            'code' => '502',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject19 = Subject::create([
            'name'  => 'Arabic',
            'type' => 'Foreign Languages',
            'code' => '503',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject20 = Subject::create([
            'name'  => 'Sign Language',
            'type' => 'Foreign Languages',
            'code' => '504',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject21 = Subject::create([
            'name'  => 'Music',
            'type' => 'Foreign Languages',
            'code' => '511',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject22 = Subject::create([
            'name'  => 'Wood Work',
            'type' => 'Technical',
            'code' => '444',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject23 = Subject::create([
            'name'  => 'Metal Work',
            'type' => 'Technical',
            'code' => '445',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject24 = Subject::create([
            'name'  => 'Building Construction',
            'type' => 'Technical',
            'code' => '446',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject25 = Subject::create([
            'name'  => 'Power Mechanics',
            'type' => 'Technical',
            'code' => '447',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject26 = Subject::create([
            'name'  => 'Electricity',
            'type' => 'Technical',
            'code' => '448',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $subject27 = Subject::create([
            'name'  => 'Aviation Technology',
            'type' => 'Technical',
            'code' => '450',
            'department_id' => $dept4->id,
            'school_id' => $school1->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        //Start of superadmins
        $user1 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'David',
            'middle_name' => 'Misiko',
            'last_name' => 'Kololi',
            'email' => 'kololimdavid@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('kenyayangu17'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        $user1->assignRole('superadmin');

        $superadmin1 = Superadmin::create([
            'address' => 'P.O Box 1976 Bungoma',
            'user_id' => $user1->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        //End of superadmins

        //Start of admins
        $user2 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'Jack',
            'middle_name' => 'Kioko',
            'last_name' => 'Kamau',
            'email' => 'jack@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Jack0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        $user2->assignRole('admin');

        $admin1 = Admin::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '26789065',
            'dob' => '08/09/1979',
            'emp_no'=> '905674325',
            'designation' => 'Engineer',
            'current_address' => 'P.O Box 9678 Bungoma',
            'permanent_address' => 'P.O Box 4320 Bungoma',
            'phone_no' => '0743267890',
            'position' => 'Student Registrar',
            'history' => 'N/A',
            'user_id' => $user2->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        //End of Admins

        //Start of teachers
        $user3 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Jackline',
            'middle_name' => 'Wangashi',
            'last_name' => 'Kamau',
            'email' => 'jackline12@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Jacklinew0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        $user3->assignRole('teacher');

        $user4 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Benjamin',
            'middle_name' => 'Waliaula',
            'last_name' => 'Watah',
            'email' => 'benjaminw@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Bejaminw0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        $user4->assignRole('teacher');

        $user5 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Janet',
            'middle_name' => 'Marion',
            'last_name' => 'Watila',
            'email' => 'janetm@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Janetm0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        $user5->assignRole('teacher');

        $user6 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'John',
            'middle_name' => 'Walioba',
            'last_name' => 'Olalo',
            'email' => 'johnw@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Johnw0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        $user6->assignRole('teacher');

        $teacher1 = Teacher::create([
            'blood_group' => 'A',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '24567812',
            'dob' => '21/10/1979',
            'emp_no'=> '65489',
            'designation' => 'P1 Teacher',
            'current_address' => 'P.O Box 9600, Bungoma',
            'permanent_address' => 'P.O Box 5043, Kakamega',
            'phone_no' => '0720786543',
            'position' => 'Head Teacher',
            'history' => 'N/A',
            'user_id' => $user3->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        $teacher2 = Teacher::create([
            'blood_group' => 'A',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '28769087',
            'dob' => '25/06/1982',
            'emp_no'=> '9807654',
            'designation' => 'P1 Teacher',
            'current_address' => 'P.O Box 90675, Bungoma',
            'permanent_address' => 'P.O Box 7865, Busia',
            'phone_no' => '0712897650',
            'position' => 'Deputy Head Teacher',
            'history' => 'N/A',
            'user_id' => $user4->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $teacher3 = Teacher::create([
            'blood_group' => 'A',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '30986754',
            'dob' => '04/05/1986',
            'emp_no'=> '043256',
            'designation' => 'P1 Teacher',
            'current_address' => 'P.O Box 8865, Bungoma',
            'permanent_address' => 'P.O Box 5634, Kitale',
            'phone_no' => '0718004534',
            'position' => 'Head Science Department',
            'history' => 'N/A',
            'user_id' => $user5->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $teacher4 = Teacher::create([
            'blood_group' => 'A',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '27907865',
            'dob' => '08/12/1990',
            'emp_no'=> '09786',
            'designation' => 'P1 Teacher',
            'current_address' => 'P.O Box 44426, Bungoma',
            'permanent_address' => 'P.O Box 6754, Nakuru',
            'phone_no' => '0790674532',
            'position' => 'Head Mathematics Department',
            'history' => 'N/A',
            'user_id' => $user6->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        //End of teachers

        //Start to parents
        $user7 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Jane',
            'middle_name' => 'Sesha',
            'last_name' => 'Waudo',
            'email' => 'janesesha@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Janesesha0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user7->assignRole('parent');

        $user8 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Elizabeth',
            'middle_name' => 'Asha',
            'last_name' => 'Jumba',
            'email' => 'elizabeth@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Elizabeth0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user8->assignRole('parent');

        $user9 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Wilber',
            'middle_name' => 'Otieno',
            'last_name' => 'Omondi',
            'email' => 'wilbero@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Wilber0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user9->assignRole('parent');

        $parent1 = MyParent::create([
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '27907865',
            'current_address' => 'P.O Box 7865, Bungoma',
            'permanent_address' => 'P.O Box 8976, Eldoret',
            'phone_no' => '0720908765',
            'user_id' => $user7->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $parent2 = MyParent::create([
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '30786543',
            'current_address' => 'P.O Box 3265, Bungoma',
            'permanent_address' => 'P.O Box 633, Bungoma',
            'phone_no' => '0718790987',
            'user_id' => $user8->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $parent3 = MyParent::create([
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '26908756',
            'current_address' => 'P.O Box 643, Bungoma',
            'permanent_address' => 'P.O Box 967, Mombasa',
            'phone_no' => '0721786547',
            'user_id' => $user9->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        //End of Parents

        //Start of students
        $user10 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Mercy',
            'middle_name' => 'Mulongo',
            'last_name' => 'Wamalwa',
            'email' => 'mercy@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Mercy0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user10->assignRole('student');

        $user11 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Fanuel',
            'middle_name' => 'Omumwalia',
            'last_name' => 'Wanambisi',
            'email' => 'fanuel@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Fanuel0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user11->assignRole('student');

        $user12 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Mary',
            'middle_name' => 'Naswa',
            'last_name' => 'Wangila',
            'email' => 'maryn@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Mary0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user12->assignRole('student');

        $user13 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Jackline',
            'middle_name' => 'Filomena',
            'last_name' => 'Ayimba',
            'email' => 'jacklinea@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Jackline0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user13->assignRole('student');

        $user14 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Jane',
            'middle_name' => 'Anita',
            'last_name' => 'Wangwe',
            'email' => 'janea@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Jane0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user14->assignRole('student');

        $user15 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Irene',
            'middle_name' => 'Nafula',
            'last_name' => 'Wafula',
            'email' => 'irenen@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Irene0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user15->assignRole('student');

        $user16 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Janepher',
            'middle_name' => 'Atieno',
            'last_name' => 'Omondi',
            'email' => 'janepher@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Janepher0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user16->assignRole('student');

        $user17 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Gladys',
            'middle_name' => 'Aisha',
            'last_name' => 'Mulinge',
            'email' => 'gladys@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Gladys0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user17->assignRole('student');

        $user18 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Benedict',
            'middle_name' => 'Wafula',
            'last_name' => 'Wabwoba',
            'email' => 'benedict@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Benedict0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user18->assignRole('student');

        $user19 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Mecyline',
            'middle_name' => 'Wanjiru',
            'last_name' => 'Wamboi',
            'email' => 'mecyline@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Mecyline0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user19->assignRole('student');

        $user20 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Joseph',
            'middle_name' => 'Barasa',
            'last_name' => 'Kundu',
            'email' => 'joseph@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Joseph0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user20->assignRole('student');

        $user21 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Gentrix',
            'middle_name' => 'Shisia',
            'last_name' => 'Isindu',
            'email' => 'gentrix@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Gentrix0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user21->assignRole('student');

        $user22 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Jane',
            'middle_name' => 'Maimuna',
            'last_name' => 'Wangwe',
            'email' => 'janemw@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Janem0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user22->assignRole('student');

        $user23 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Phanice',
            'middle_name' => 'Nasambu',
            'last_name' => 'Wabwile',
            'email' => 'phanice@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Phanice0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user23->assignRole('student');

        $user24 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Getrude',
            'middle_name' => 'Jerubo',
            'last_name' => 'Ogamba',
            'email' => 'getrude@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Getrude0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user24->assignRole('student');

        $user25 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Ali',
            'middle_name' => 'Mohammed',
            'last_name' => 'Mwani',
            'email' => 'ali@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Ali0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user25->assignRole('student');

        $user26 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Caroline',
            'middle_name' => 'Shinyaga',
            'last_name' => 'Wagabi',
            'email' => 'caroline@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('caroline0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user26->assignRole('student');

        $user27 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'James',
            'middle_name' => 'Muli',
            'last_name' => 'Mulinge',
            'email' => 'jamesm@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('James0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user27->assignRole('student');

        $user28 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Milca',
            'middle_name' => 'Ayimba',
            'last_name' => 'Mwaniki',
            'email' => 'milca@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Milca0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user28->assignRole('student');

        $user29 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Christine',
            'middle_name' => 'Jeruto',
            'last_name' => 'Cherop',
            'email' => 'christinej@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Christine0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user29->assignRole('student');

        $user30 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Phillis',
            'middle_name' => 'Nasimiyi',
            'last_name' => 'Wanyonyi',
            'email' => 'phillisn@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Phillis0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user30->assignRole('student');

        $user31 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Morris',
            'middle_name' => 'Wafula',
            'last_name' => 'Watila',
            'email' => 'morrisw@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Morris0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user31->assignRole('student');

        $user32 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Johnstone',
            'middle_name' => 'Kamau',
            'last_name' => 'Ndunge',
            'email' => 'johnstone12@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Johnstone120000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user32->assignRole('student');

        $user33 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Breakcides',
            'middle_name' => 'Waliaula',
            'last_name' => 'Wafula',
            'email' => 'breakcides@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Breakcides0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user33->assignRole('student');


        $student1 = Student::create([
            'blood_group' => 'A',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0723669078',
            'admission_no' => '167850',
            'dob' => '04/06/1994',
            'doa' => '07/03/2021',
            'position' => 'Student Leader',
            'active' => 1,
            'stream_id' => $stream1->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user10->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student2 = Student::create([
            'blood_group' => 'A',
            'image' => 'image.png',
            'gender' => 'Male',
            'phone_no' => '0721889067',
            'admission_no' => '14325',
            'dob' => '08/07/2005',
            'doa' => '07/03/2021',
            'position' => 'Deputy Student Leader',
            'active' => 1,
            'stream_id' => $stream1->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user11->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student3 = Student::create([
            'blood_group' => 'B+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0701346788',
            'admission_no' => '1906543',
            'dob' => '04/06/1994',
            'doa' => '07/03/2021',
            'position' => 'Class Prefect',
            'active' => 1,
            'stream_id' => $stream1->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user12->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student4 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0720665432',
            'admission_no' => '124563',
            'dob' => '05/09/1994',
            'doa' => '07/03/2021',
            'position' => 'Assistant Class Prefect',
            'active' => 1,
            'stream_id' => $stream1->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user13->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student5 = Student::create([
            'blood_group' => 'A+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0721887965',
            'admission_no' => '1887654',
            'dob' => '03/08/2005',
            'doa' => '07/03/2021',
            'position' => 'Time Keeper',
            'active' => 1,
            'stream_id' => $stream1->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user14->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student6 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0700675432',
            'admission_no' => '19087',
            'dob' => '08/09/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream1->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user15->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student7 = Student::create([
            'blood_group' => 'A+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0701226784',
            'admission_no' => '19075',
            'dob' => '05/08/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream2->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user16->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student8 = Student::create([
            'blood_group' => 'B+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0724678890',
            'admission_no' => '17890',
            'dob' => '09/06/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream2->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user17->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student9 = Student::create([
            'blood_group' => 'A+',
            'image' => 'image.png',
            'gender' => 'Male',
            'phone_no' => '0701234563',
            'admission_no' => '12578',
            'dob' => '08/08/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream2->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user18->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student10 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0700654588',
            'admission_no' => '166454',
            'dob' => '09/03/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream2->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user19->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student11 = Student::create([
            'blood_group' => 'B+',
            'image' => 'image.png',
            'gender' => 'Male',
            'phone_no' => '0790345677',
            'admission_no' => '18845',
            'dob' => '05/09/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream2->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user20->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student12 = Student::create([
            'blood_group' => 'B+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0745678890',
            'admission_no' => '1884532',
            'dob' => '03/09/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream2->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user21->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student13 = Student::create([
            'blood_group' => 'A+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0710908867',
            'admission_no' => '19976',
            'dob' => '04/09/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream3->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user22->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student14 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0712786654',
            'admission_no' => '14367',
            'dob' => '06/09/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream3->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user23->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student15 = Student::create([
            'blood_group' => 'B+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0702456734',
            'admission_no' => '17856',
            'dob' => '04/07/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream3->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user24->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student16 = Student::create([
            'blood_group' => 'A+',
            'image' => 'image.png',
            'gender' => 'Male',
            'phone_no' => '0701227891',
            'admission_no' => '100453',
            'dob' => '04/08/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream3->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory2->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user25->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student17 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0712345687',
            'admission_no' => '1886324',
            'dob' => '04/05/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream3->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user26->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student18 = Student::create([
            'blood_group' => 'A+',
            'image' => 'image.png',
            'gender' => 'Male',
            'phone_no' => '0700678890',
            'admission_no' => '18955',
            'dob' => '05/07/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream3->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user27->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student19 = Student::create([
            'blood_group' => 'B+',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0700567890',
            'admission_no' => '13581',
            'dob' => '05/05/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream4->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user28->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student20 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '07889654',
            'admission_no' => '19043',
            'dob' => '09/06/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream4->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user29->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student21 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0710678654',
            'admission_no' => '19543',
            'dob' => '10/04/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream4->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user30->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student22 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'phone_no' => '07906743',
            'admission_no' => '1342',
            'dob' => '08/07/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream4->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user7->parent->id,
            'user_id' => $user31->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student23 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'phone_no' => '0712907654',
            'admission_no' => '19076',
            'dob' => '12/04/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream4->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user8->parent->id,
            'user_id' => $user32->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $student24 = Student::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'phone_no' => '0723564387',
            'admission_no' => '19067',
            'dob' => '05/09/2005',
            'doa' => '07/03/2021',
            'position' => 'Ordinary Student',
            'active' => 1,
            'stream_id' => $stream4->id,
            'intake_id' => $intake1->id,
            'dormitory_id' => $dormitory1->id,
            'admin_id' => $user2->admin->id,
            'parent_id' => $user9->parent->id,
            'user_id' => $user33->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        // End of Students

        // Start of accountants
        $user34 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Johnstone',
            'middle_name' => 'Kisija',
            'last_name' => 'Waliaula',
            'email' => 'johnstone@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Johnstone0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user34->assignRole('accountant');

        $user35 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Christine',
            'middle_name' => 'Nakhumicha',
            'last_name' => 'Wafula',
            'email' => 'christine@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Christine0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user35->assignRole('accountant');

        $accountant1 = Accountant::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '27553421',
            'dob' => '25/01/1984',
            'emp_no'=> '564328',
            'designation' => 'CPA1',
            'current_address' => 'P.O Box 8543, Bungoma',
            'permanent_address' => 'P.O Box 6745, Nairobi',
            'phone_no' => '0734127860',
            'position' => 'Senior Accountant',
            'history' => 'N/A',
            'user_id' => $user34->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $accountant2 = Accountant::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '28906754',
            'dob' => '12/04/1991',
            'emp_no'=> '908756',
            'designation' => 'CPA1',
            'current_address' => 'P.O Box 8765, Bungoma',
            'permanent_address' => 'P.O Box 9342, Kitale',
            'phone_no' => '0720987690',
            'position' => 'Deputy Senior Accountant',
            'history' => 'N/A',
            'user_id' => $user35->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        //End of accountants

        //Start of matrons
        $user36 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Margret',
            'middle_name' => 'Nafula',
            'last_name' => 'Wafula',
            'email' => 'margret@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Margret0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user36->assignRole('matron');

        $matron1 = Matron::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '29087545',
            'dob' => '01/11/1990',
            'emp_no'=> '650097',
            'designation' => 'CPA1',
            'current_address' => 'P.O Box 7640, Bungoma',
            'permanent_address' => 'P.O Box 2390, Nakuru',
            'phone_no' => '0720897645',
            'position' => 'Senior Matron',
            'history' => 'N/A',
            'user_id' => $user36->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        //End of matrons

        //Start of librarians
        $user37 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'James',
            'middle_name' => 'Khaemba',
            'last_name' => 'Wafula',
            'email' => 'james@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('James0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user37->assignRole('librarian');

        $user38 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Lilian',
            'middle_name' => 'Nafula',
            'last_name' => 'Wafula',
            'email' => 'lilian@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Lilian0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user38->assignRole('librarian');

        $librarian1 = Librarian::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '22675432',
            'dob' => '27/10/1989',
            'emp_no'=> '980065',
            'designation' => 'CPA1',
            'current_address' => 'P.O Box 7865, Bungoma',
            'permanent_address' => 'P.O Box 9090, Nairobi',
            'phone_no' => '0712675432',
            'position' => 'Senior Librarian',
            'history' => 'N/A',
            'user_id' => $user37->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $librarian2 = Librarian::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '22786543',
            'dob' => '19/08/1982',
            'emp_no'=> '18564',
            'designation' => 'LIB2',
            'current_address' => 'P.O Box 8609, Bungoma',
            'permanent_address' => 'P.O Box 9564, Nakuru',
            'phone_no' => '0726897645',
            'position' => 'Deputy Senior Librarian',
            'history' => 'N/A',
            'user_id' => $user38->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        //End of librarians

        //Start of subordinate staffs
        $user39 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Metrine',
            'middle_name' => 'Akinyi',
            'last_name' => 'Opiyo',
            'email' => 'metrinea@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Metrine0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user39->assignRole('subordinate');

        $user40 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Daniel',
            'middle_name' => 'Koril',
            'last_name' => 'Chesang',
            'email' => 'daniel@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Daniel0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user40->assignRole('subordinate');

        $subordinate1 = Subordinate::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '2879008',
            'dob' => '18/12/1994',
            'emp_no'=> '986754',
            'designation' => 'Secretariat Course',
            'current_address' => 'P.O Box 8965, Bungoma',
            'permanent_address' => 'P.O Box 7843, Mombasa',
            'phone_no' => '0722346754',
            'position' => 'School Secretary',
            'history' => 'N/A',
            'user_id' => $user39->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $subordinate2 = Subordinate::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '24564087',
            'dob' => '20/04/1980',
            'emp_no'=> '222356',
            'designation' => 'Farmer',
            'current_address' => 'P.O Box 8745, Bungoma',
            'permanent_address' => 'P.O Box 7765, Kakamega',
            'phone_no' => '0727908764',
            'position' => 'Gardener',
            'history' => 'N/A',
            'user_id' => $user40->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        //End of staffs

        //Start of Admins Again
        $user41 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'Moses',
            'middle_name' => 'Madibo',
            'last_name' => 'Wafula',
            'email' => 'moses2@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Moses20000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user41->assignRole('admin');

        $user42 = User::create([
            'salutation' => 'Mrs',
            'first_name' => 'Linet',
            'middle_name' => 'Anyango',
            'last_name' => 'Kere',
            'email' => 'linet3@gmail.com',
            'gender' => 'Female',
            'password' => Hash::make('Linet30000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user42->assignRole('admin');

        $user43 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'Dennis',
            'middle_name' => 'Ouko',
            'last_name' => 'Otieno',
            'email' => 'dennis5@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Dennis50000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user43->assignRole('admin');

        $user44 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'Austin',
            'middle_name' => 'Wanjala',
            'last_name' => 'Watila',
            'email' => 'austin6@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Austin60000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user44->assignRole('admin');

        $user45 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'Clementine',
            'middle_name' => 'Asila',
            'last_name' => 'Barasa',
            'email' => 'clementine@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Clementine0000**'),
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user45->assignRole('admin');

        $admin2 = Admin::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '23786543',
            'dob' => '08/12/1979',
            'emp_no'=> '74325',
            'designation' => 'Engineer',
            'current_address' => 'P.O Box 7865, Bungoma',
            'permanent_address' => 'P.O Box 987, Bungoma',
            'phone_no' => '0721432178',
            'position' => 'Library Admin',
            'history' => 'N/A',
            'user_id' => $user41->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $admin3 = Admin::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '28790078',
            'dob' => '08/10/1988',
            'emp_no'=> '70945',
            'designation' => 'Engineer',
            'current_address' => 'P.O Box 9067, Bungoma',
            'permanent_address' => 'P.O Box 3428, Bungoma',
            'phone_no' => '0722769087',
            'position' => 'Accounts Admin',
            'history' => 'N/A',
            'user_id' => $user42->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $admin4 = Admin::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '26784321',
            'dob' => '20/10/1984',
            'emp_no'=> '9745',
            'designation' => 'Engineer',
            'current_address' => 'P.O Box 7087, Bungoma',
            'permanent_address' => 'P.O Box 222, Bungoma',
            'phone_no' => '0701234536',
            'position' => 'Exam Registrar',
            'history' => 'N/A',
            'user_id' => $user43->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $admin5 = Admin::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Male',
            'id_no' => '27453245',
            'dob' => '02/05/1979',
            'emp_no'=> '9067',
            'designation' => 'Engineer',
            'current_address' => 'P.O Box 9645, Bungoma',
            'permanent_address' => 'P.O Box 532, Bungoma',
            'phone_no' => '0722893421',
            'position' => 'Academic Registrar',
            'history' => 'N/A',
            'user_id' => $user44->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $admin6 = Admin::create([
            'blood_group' => 'B',
            'image' => 'image.png',
            'gender' => 'Female',
            'id_no' => '23789065',
            'dob' => '06/02/1984',
            'emp_no'=> '810',
            'designation' => 'Engineer',
            'current_address' => 'P.O Box 4675, Bungoma',
            'permanent_address' => 'P.O Box 7843, Bungoma',
            'phone_no' => '0710905643',
            'position' => 'Data Officer',
            'history' => 'N/A',
            'user_id' => $user45->id,
            'school_id' => $school1->id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        //End of Admins
    }
}
