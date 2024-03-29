<?php

namespace Database\Seeders;

use DB;
use Hash;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('students')->delete();

        $students = [
        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Mercy',
				'middle_name' => 'Mulongo',
				'last_name' => 'Wamalwa',
				'blood_group' => 'A',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0723669078',
        		'admission_no' => '167850',
        		'dob' => '04/06/1994',
        		'doa' => '07/03/2021',
        		'email' => 'mercy@gmail.com',
        		'role' => 'studentleader',
        		'active' => 1,
        		'stream_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('Mercy0000**'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Fanuel',
				'middle_name' => 'Omumwalia',
				'last_name' => 'Wanambisi',
				'blood_group' => 'A',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0721889067',
        		'admission_no' => '14325',
        		'dob' => '08/07/2005',
        		'doa' => '07/03/2021',
        		'email' => 'fanuel@gmail.com',
        		'role' => 'deputystudentleader',
        		'active' => 1,
        		'stream_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('Fanuel0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Mary',
				'middle_name' => 'Naswa',
				'last_name' => 'Wangila',
				'blood_group' => 'B+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0701346788',
        		'admission_no' => '1906543',
        		'dob' => '04/06/1994',
        		'doa' => '07/03/2021',
        		'email' => 'maryn@gmail.com',
        		'role' => 'streamprefect',
        		'active' => 1,
        		'stream_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Mary0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Jackline',
				'middle_name' => 'Filomena',
				'last_name' => 'Ayimba',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0720665432',
        		'admission_no' => '124563',
        		'dob' => '05/09/1994',
        		'doa' => '07/03/2021',
        		'email' => 'jacklinea@gmail.com',
        		'role' => 'assistantstreamprefect',
        		'active' => 1,
        		'stream_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('Jackline0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Jane',
				'middle_name' => 'Anita',
				'last_name' => 'Wangwe',
				'blood_group' => 'A+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0721887965',
        		'admission_no' => '1887654',
        		'dob' => '03/08/2005',
        		'doa' => '07/03/2021',
        		'email' => 'janea@gmail.com',
        		'role' => 'timekeeper',
        		'active' => 1,
        		'stream_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Jane0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Irene',
				'middle_name' => 'Nafula',
				'last_name' => 'Wafula',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0700675432',
        		'admission_no' => '19087',
        		'dob' => '08/09/2005',
        		'doa' => '07/03/2021',
        		'email' => 'irenen@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('Irene0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Janepher',
				'middle_name' => 'Atieno',
				'last_name' => 'Omondi',
				'blood_group' => 'A+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0701226784',
        		'admission_no' => '19075',
        		'dob' => '05/08/2005',
        		'doa' => '07/03/2021',
        		'email' => 'janepher@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('Janepher0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Gladys',
				'middle_name' => 'Aisha',
				'last_name' => 'Mulinge',
				'blood_group' => 'B+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0724678890',
        		'admission_no' => '17890',
        		'dob' => '09/06/2005',
        		'doa' => '07/03/2021',
        		'email' => 'gladys@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Gladys0000**'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Benedict',
				'middle_name' => 'Wafula',
				'last_name' => 'Wabwoba',
				'blood_group' => 'A+',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0701234563',
        		'admission_no' => '12578',
        		'dob' => '08/08/2005',
        		'doa' => '07/03/2021',
        		'email' => 'benedict@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('Benedict0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Mecyline',
				'middle_name' => 'Wanjiru',
				'last_name' => 'Wamboi',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0700654588',
        		'admission_no' => '166454',
        		'dob' => '09/03/2005',
        		'doa' => '07/03/2021',
        		'email' => 'mecyline@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Mecyline0000**'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Joseph',
				'middle_name' => 'Barasa',
				'last_name' => 'Kundu',
				'blood_group' => 'B+',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0790345677',
        		'admission_no' => '18845',
        		'dob' => '05/09/2005',
        		'doa' => '07/03/2021',
        		'email' => 'joseph@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('Joseph0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Gentrix',
				'middle_name' => 'Shisia',
				'last_name' => 'Isindu',
				'blood_group' => 'B+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0745678890',
        		'admission_no' => '1884532',
        		'dob' => '03/09/2005',
        		'doa' => '07/03/2021',
        		'email' => 'gentrix@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('Gentrix0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Jane',
				'middle_name' => 'Maimuna',
				'last_name' => 'Wangwe',
				'blood_group' => 'A+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0710908867',
        		'admission_no' => '19976',
        		'dob' => '04/09/2005',
        		'doa' => '07/03/2021',
        		'email' => 'janemw@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('Janem0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Phanice',
				'middle_name' => 'Nasambu',
				'last_name' => 'Wabwile',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0712786654',
        		'admission_no' => '14367',
        		'dob' => '06/09/2005',
        		'doa' => '07/03/2021',
        		'email' => 'phanice@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Phanice0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Getrude',
				'middle_name' => 'Jerubo',
				'last_name' => 'Ogamba',
				'blood_group' => 'B+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0702456734',
        		'admission_no' => '17856',
        		'dob' => '04/07/2005',
        		'doa' => '07/03/2021',
        		'email' => 'getrude@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('Getrude0000**'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Ali',
				'middle_name' => 'Mohammed',
				'last_name' => 'Mwani',
				'blood_group' => 'A+',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0701227891',
        		'admission_no' => '100453',
        		'dob' => '04/08/2005',
        		'doa' => '07/03/2021',
        		'email' => 'ali@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('Ali0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Caroline',
				'middle_name' => 'Shinyaga',
				'last_name' => 'Wagabi',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0712345687',
        		'admission_no' => '1886324',
        		'dob' => '04/05/2005',
        		'doa' => '07/03/2021',
        		'email' => 'caroline@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('caroline0000**'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'James',
				'middle_name' => 'Muli',
				'last_name' => 'Mulinge',
				'blood_group' => 'A+',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0700678890',
        		'admission_no' => '18955',
        		'dob' => '05/07/2005',
        		'doa' => '07/03/2021',
        		'email' => 'jamesm@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('James0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Milca',
				'middle_name' => 'Ayimba',
				'last_name' => 'Mwaniki',
				'blood_group' => 'B+',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0700567890',
        		'admission_no' => '13581',
        		'dob' => '05/05/2005',
        		'doa' => '07/03/2021',
        		'email' => 'milca@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 4,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('Milca0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Christine',
				'middle_name' => 'Jeruto',
				'last_name' => 'Cherop',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '07889654',
        		'admission_no' => '19043',
        		'dob' => '09/06/2005',
        		'doa' => '07/03/2021',
        		'email' => 'christinej@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 4,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Christine0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Phillis',
				'middle_name' => 'Nasimiyi',
				'last_name' => 'Wanyonyi',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0710678654',
        		'admission_no' => '19543',
        		'dob' => '10/04/2005',
        		'doa' => '07/03/2021',
        		'email' => 'phillisn@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 4,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Phillis0000**'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Morris',
				'middle_name' => 'Wafula',
				'last_name' => 'Watila',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '07906743',
        		'admission_no' => '1342',
        		'dob' => '08/07/2005',
        		'doa' => '07/03/2021',
        		'email' => 'morrisw@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 4,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'password' => Hash::make('Morris0000**'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Johnstone',
				'middle_name' => 'Kamau',
				'last_name' => 'Ndunge',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0712907654',
        		'admission_no' => '19076',
        		'dob' => '12/04/2005',
        		'doa' => '07/03/2021',
        		'email' => 'johnstone@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 4,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 3,
        		'password' => Hash::make('Johnstone0000**'),
        	],

        	[
        		'salutation' => 'Miss.',
				'first_name' => 'Breakcides',
				'middle_name' => 'Waliaula',
				'last_name' => 'Wafula',
				'blood_group' => 'B',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0723564387',
        		'admission_no' => '19067',
        		'dob' => '05/09/2005',
        		'doa' => '07/03/2021',
        		'email' => 'breakcides@gmail.com',
        		'role' => 'ordinarystudent',
        		'active' => 1,
        		'stream_id' => 4,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 2,
        		'password' => Hash::make('Breakcides0000**'),
        	],
        ];

        Student::insert($students);
    }
}
