<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
        $this->call(SchoolTableSeeder::class);
        $this->call(YearTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(TermTableSeeder::class);
        $this->call(IntakeTableSeeder::class);
        $this->call(DepartmentSectionTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(StreamSectionTableSeeder::class);
        $this->call(StreamTableSeeder::class);
        $this->call(ExamTableSeeder::class);
        $this->call(DormitoryTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);

        //Start of superadmins
        $user1 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'David',
            'middle_name' => 'Misiko',
            'last_name' => 'Kololi',
            'email' => 'kololimdavid@gmail.com',
            'password' => Hash::make('kenyayangu17'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user1->assignRole('superadmin');

        DB::table('superadmins')->insert([
            [
                'address' => 'P.O Box 1976, Bungoma',
                'user_id' => $user1->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
        //End of superadmins

        //Start of admins
        $user2 = User::create([
            'salutation' => 'Mr',
            'first_name' => 'Jack',
            'middle_name' => 'Kioko',
            'last_name' => 'Kamau',
            'email' => 'jack@gmail.com',
            'password' => Hash::make('Jack0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user2->assignRole('admin');

        DB::table('admins')->insert([
            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Male',
                'id_no' => '26789065',
                'dob' => '08/09/1979',
                'emp_no'=> '905674325',
                'designation' => 'Engineer',
                'current_address' => 'P.O Box 9678, Bungoma',
                'permanent_address' => 'P.O Box 4320, Bungoma',
                'phone_no' => '0743267890',
                'position' => 'Student Registrar',
                'history' => 'N/A',
                'user_id' => $user2->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
        //End of Admins

        //Start of teachers
        $user3 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Jackline',
            'middle_name' => 'Wangashi',
            'last_name' => 'Kamau',
            'email' => 'jackline12@gmail.com',
            'password' => Hash::make('Jacklinew0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user3->assignRole('teacher');

        $user4 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Benjamin',
            'middle_name' => 'Waliaula',
            'last_name' => 'Watah',
            'email' => 'benjaminw@gmail.com',
            'password' => Hash::make('Bejaminw0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user4->assignRole('teacher');

        $user5 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Janet',
            'middle_name' => 'Marion',
            'last_name' => 'Watila',
            'email' => 'janetm@gmail.com',
            'password' => Hash::make('Janetm0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user5->assignRole('teacher');

        $user6 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'John',
            'middle_name' => 'Walioba',
            'last_name' => 'Olalo',
            'email' => 'johnw@gmail.com',
            'password' => Hash::make('Johnw0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user6->assignRole('teacher');

        DB::table('teachers')->insert([
            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
        //End of teachers

        //Start to parents
        $user7 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Jane',
            'middle_name' => 'Sesha',
            'last_name' => 'Waudo',
            'email' => 'janesesha@gmail.com',
            'password' => Hash::make('Janesesha0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user7->assignRole('parent');

        $user8 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Elizabeth',
            'middle_name' => 'Asha',
            'last_name' => 'Jumba',
            'email' => 'elizabeth@gmail.com',
            'password' => Hash::make('Elizabeth0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user8->assignRole('parent');

        $user9 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Wilber',
            'middle_name' => 'Otieno',
            'last_name' => 'Omondi',
            'email' => 'wilbero@gmail.com',
            'password' => Hash::make('Wilber0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user9->assignRole('parent');

        DB::table('parents')->insert([
            [
                'image' => 'image.png',
                'gender' => 'Female',
                'id_no' => '27907865',
                'current_address' => 'P.O Box 7865, Bungoma',
                'permanent_address' => 'P.O Box 8976, Eldoret',
                'phone_no' => '0720908765',
                'user_id' => $user7->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'image' => 'image.png',
                'gender' => 'Female',
                'id_no' => '30786543',
                'current_address' => 'P.O Box 3265, Bungoma',
                'permanent_address' => 'P.O Box 633, Bungoma',
                'phone_no' => '0718790987',
                'user_id' => $user8->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'image' => 'image.png',
                'gender' => 'Male',
                'id_no' => '26908756',
                'current_address' => 'P.O Box 643, Bungoma',
                'permanent_address' => 'P.O Box 967, Mombasa',
                'phone_no' => '0721786547',
                'user_id' => $user9->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

        ]);
        //End of Parents

        //Start of students
        $user10 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Mercy',
            'middle_name' => 'Mulongo',
            'last_name' => 'Wamalwa',
            'email' => 'mercy@gmail.com',
            'password' => Hash::make('Mercy0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user10->assignRole('student');

        $user11 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Fanuel',
            'middle_name' => 'Omumwalia',
            'last_name' => 'Wanambisi',
            'email' => 'fanuel@gmail.com',
            'password' => Hash::make('Fanuel0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user11->assignRole('student');

        $user12 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Mary',
            'middle_name' => 'Naswa',
            'last_name' => 'Wangila',
            'email' => 'maryn@gmail.com',
            'password' => Hash::make('Mary0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user12->assignRole('student');

        $user13 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Jackline',
            'middle_name' => 'Filomena',
            'last_name' => 'Ayimba',
            'email' => 'jacklinea@gmail.com',
            'password' => Hash::make('Jackline0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user13->assignRole('student');

        $user14 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Jane',
            'middle_name' => 'Anita',
            'last_name' => 'Wangwe',
            'email' => 'janea@gmail.com',
            'password' => Hash::make('Jane0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user14->assignRole('student');

        $user15 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Irene',
            'middle_name' => 'Nafula',
            'last_name' => 'Wafula',
            'email' => 'irenen@gmail.com',
            'password' => Hash::make('Irene0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user15->assignRole('student');

        $user16 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Janepher',
            'middle_name' => 'Atieno',
            'last_name' => 'Omondi',
            'email' => 'janepher@gmail.com',
            'password' => Hash::make('Janepher0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user16->assignRole('student');

        $user17 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Gladys',
            'middle_name' => 'Aisha',
            'last_name' => 'Mulinge',
            'email' => 'gladys@gmail.com',
            'password' => Hash::make('Gladys0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user17->assignRole('student');

        $user18 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Benedict',
            'middle_name' => 'Wafula',
            'last_name' => 'Wabwoba',
            'email' => 'benedict@gmail.com',
            'password' => Hash::make('Benedict0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user18->assignRole('student');

        $user19 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Mecyline',
            'middle_name' => 'Wanjiru',
            'last_name' => 'Wamboi',
            'email' => 'mecyline@gmail.com',
            'password' => Hash::make('Mecyline0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user19->assignRole('student');

        $user20 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Joseph',
            'middle_name' => 'Barasa',
            'last_name' => 'Kundu',
            'email' => 'joseph@gmail.com',
            'password' => Hash::make('Joseph0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user20->assignRole('student');

        $user21 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Gentrix',
            'middle_name' => 'Shisia',
            'last_name' => 'Isindu',
            'email' => 'gentrix@gmail.com',
            'password' => Hash::make('Gentrix0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user21->assignRole('student');

        $user22 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Jane',
            'middle_name' => 'Maimuna',
            'last_name' => 'Wangwe',
            'email' => 'janemw@gmail.com',
            'password' => Hash::make('Janem0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user22->assignRole('student');

        $user23 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Phanice',
            'middle_name' => 'Nasambu',
            'last_name' => 'Wabwile',
            'email' => 'phanice@gmail.com',
            'password' => Hash::make('Phanice0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user23->assignRole('student');

        $user24 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Getrude',
            'middle_name' => 'Jerubo',
            'last_name' => 'Ogamba',
            'email' => 'getrude@gmail.com',
            'password' => Hash::make('Getrude0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user24->assignRole('student');

        $user25 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Ali',
            'middle_name' => 'Mohammed',
            'last_name' => 'Mwani',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('Ali0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user25->assignRole('student');

        $user26 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Caroline',
            'middle_name' => 'Shinyaga',
            'last_name' => 'Wagabi',
            'email' => 'caroline@gmail.com',
            'password' => Hash::make('caroline0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user26->assignRole('student');

        $user27 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'James',
            'middle_name' => 'Muli',
            'last_name' => 'Mulinge',
            'email' => 'jamesm@gmail.com',
            'password' => Hash::make('James0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user27->assignRole('student');

        $user28 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Milca',
            'middle_name' => 'Ayimba',
            'last_name' => 'Mwaniki',
            'email' => 'milca@gmail.com',
            'password' => Hash::make('Milca0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user28->assignRole('student');

        $user29 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Christine',
            'middle_name' => 'Jeruto',
            'last_name' => 'Cherop',
            'email' => 'christinej@gmail.com',
            'password' => Hash::make('Christine0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user29->assignRole('student');

        $user30 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Phillis',
            'middle_name' => 'Nasimiyi',
            'last_name' => 'Wanyonyi',
            'email' => 'phillisn@gmail.com',
            'password' => Hash::make('Phillis0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user30->assignRole('student');

        $user31 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Morris',
            'middle_name' => 'Wafula',
            'last_name' => 'Watila',
            'email' => 'morrisw@gmail.com',
            'password' => Hash::make('Morris0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user31->assignRole('student');

        $user32 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Johnstone',
            'middle_name' => 'Kamau',
            'last_name' => 'Ndunge',
            'email' => 'johnstone12@gmail.com',
            'password' => Hash::make('Johnstone120000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user32->assignRole('student');

        $user33 = User::create([
            'salutation' => 'Miss.',
            'first_name' => 'Breakcides',
            'middle_name' => 'Waliaula',
            'last_name' => 'Wafula',
            'email' => 'breakcides@gmail.com',
            'password' => Hash::make('Breakcides0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user33->assignRole('student');

        DB::table('students')->insert([
            [
                'blood_group' => 'A',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0723669078',
                'admission_no' => '167850',
                'dob' => '04/06/1994',
                'doa' => '07/03/2021',
                'position' => 'Student Leader',
                'active' => 1,
                'stream_id' => 1,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user10->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'A',
                'image' => 'image.png',
                'gender' => 'Male',
                'phone_no' => '0721889067',
                'admission_no' => '14325',
                'dob' => '08/07/2005',
                'doa' => '07/03/2021',
                'position' => 'Deputy Student Leader',
                'active' => 1,
                'stream_id' => 1,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user11->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0701346788',
                'admission_no' => '1906543',
                'dob' => '04/06/1994',
                'doa' => '07/03/2021',
                'position' => 'Class Prefect',
                'active' => 1,
                'stream_id' => 1,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user12->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0720665432',
                'admission_no' => '124563',
                'dob' => '05/09/1994',
                'doa' => '07/03/2021',
                'position' => 'Assistant Class Prefect',
                'active' => 1,
                'stream_id' => 1,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user13->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'A+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0721887965',
                'admission_no' => '1887654',
                'dob' => '03/08/2005',
                'doa' => '07/03/2021',
                'position' => 'Time Keeper',
                'active' => 1,
                'stream_id' => 1,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user14->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0700675432',
                'admission_no' => '19087',
                'dob' => '08/09/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 1,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user15->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'A+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0701226784',
                'admission_no' => '19075',
                'dob' => '05/08/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 2,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user16->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0724678890',
                'admission_no' => '17890',
                'dob' => '09/06/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 2,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user17->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'A+',
                'image' => 'image.png',
                'gender' => 'Male',
                'phone_no' => '0701234563',
                'admission_no' => '12578',
                'dob' => '08/08/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 2,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user18->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0700654588',
                'admission_no' => '166454',
                'dob' => '09/03/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 2,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user19->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B+',
                'image' => 'image.png',
                'gender' => 'Male',
                'phone_no' => '0790345677',
                'admission_no' => '18845',
                'dob' => '05/09/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 2,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user20->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0745678890',
                'admission_no' => '1884532',
                'dob' => '03/09/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 2,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user21->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'A+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0710908867',
                'admission_no' => '19976',
                'dob' => '04/09/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 3,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user22->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0712786654',
                'admission_no' => '14367',
                'dob' => '06/09/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 3,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user23->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0702456734',
                'admission_no' => '17856',
                'dob' => '04/07/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 3,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user24->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'A+',
                'image' => 'image.png',
                'gender' => 'Male',
                'phone_no' => '0701227891',
                'admission_no' => '100453',
                'dob' => '04/08/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 3,
                'intake_id' => 1,
                'dormitory_id' => 2,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user25->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0712345687',
                'admission_no' => '1886324',
                'dob' => '04/05/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 3,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user26->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'A+',
                'image' => 'image.png',
                'gender' => 'Male',
                'phone_no' => '0700678890',
                'admission_no' => '18955',
                'dob' => '05/07/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 3,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user27->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B+',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0700567890',
                'admission_no' => '13581',
                'dob' => '05/05/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 4,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user28->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '07889654',
                'admission_no' => '19043',
                'dob' => '09/06/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 4,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user29->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0710678654',
                'admission_no' => '19543',
                'dob' => '10/04/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 4,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user30->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Male',
                'phone_no' => '07906743',
                'admission_no' => '1342',
                'dob' => '08/07/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 4,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user7->parent->id,
                'user_id' => $user31->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Male',
                'phone_no' => '0712907654',
                'admission_no' => '19076',
                'dob' => '12/04/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 4,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user8->parent->id,
                'user_id' => $user32->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
                'blood_group' => 'B',
                'image' => 'image.png',
                'gender' => 'Female',
                'phone_no' => '0723564387',
                'admission_no' => '19067',
                'dob' => '05/09/2005',
                'doa' => '07/03/2021',
                'position' => 'Ordinary Student',
                'active' => 1,
                'stream_id' => 4,
                'intake_id' => 1,
                'dormitory_id' => 1,
                'intake_id' => 1,
                'admin_id' => $user2->admin->id,
                'parent_id' => $user9->parent->id,
                'user_id' => $user33->id,
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]

        ]);
        // End of Students

        // Start of accountants
        $user34 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Johnstone',
            'middle_name' => 'Kisija',
            'last_name' => 'Waliaula',
            'email' => 'johnstone@gmail.com',
            'password' => Hash::make('Johnstone0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user34->assignRole('accountant');

        $user35 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Christine',
            'middle_name' => 'Nakhumicha',
            'last_name' => 'Wafula',
            'email' => 'christine@gmail.com',
            'password' => Hash::make('Christine0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user35->assignRole('accountant');

        DB::table('accountants')->insert([
            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
        //End of accountants

        //Start of matrons
        $user36 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Margret',
            'middle_name' => 'Nafula',
            'last_name' => 'Wafula',
            'email' => 'margret@gmail.com',
            'password' => Hash::make('Margret0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user36->assignRole('matron');

        DB::table('matrons')->insert([
            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
        //End of matrons

        //Start of librarians
        $user37 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'James',
            'middle_name' => 'Khaemba',
            'last_name' => 'Wafula',
            'email' => 'james@gmail.com',
            'password' => Hash::make('James0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user37->assignRole('librarian');

        $user38 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Lilian',
            'middle_name' => 'Nafula',
            'last_name' => 'Wafula',
            'email' => 'lilian@gmail.com',
            'password' => Hash::make('Lilian0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user38->assignRole('librarian');

        DB::table('librarians')->insert([
            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
        //End of librarians

        //Start of subordinate staffs
        $user39 = User::create([
            'salutation' => 'Mrs.',
            'first_name' => 'Metrine',
            'middle_name' => 'Akinyi',
            'last_name' => 'Opiyo',
            'email' => 'metrinea@gmail.com',
            'password' => Hash::make('Metrine0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user39->assignRole('subordinate');

        $user40 = User::create([
            'salutation' => 'Mr.',
            'first_name' => 'Daniel',
            'middle_name' => 'Koril',
            'last_name' => 'Chesang',
            'email' => 'daniel@gmail.com',
            'password' => Hash::make('Daniel0000**'),
            'school_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $user40->assignRole('subordinate');

        DB::table('subordinates')->insert([
            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],

            [
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
                'school_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
        //End of staffs
    }
}
