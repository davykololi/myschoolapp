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
        		'title' => 'Miss.',
        		'name' => 'Mercy Mulongo Wamalwa',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0723669078',
        		'admission_no' => '00167850',
        		'dob' => '1994-06-04',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 3456, Bungoma',
        		'history' => 'N/A',
        		'email' => 'mercy@gmail.com',
        		'stream_id' => 1,
        		'bg_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 1,
        		'password' => Hash::make('Mercy0000**'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'Fanuel Omumwalia',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0721889067',
        		'admission_no' => '0014325',
        		'dob' => '2005-07-08',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 8976, Bungoma',
        		'history' => 'N/A',
        		'email' => 'fanuel@gmail.com',
        		'stream_id' => 1,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Fanuel0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Mary Naswa Wangila',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0701346788',
        		'admission_no' => '001906543',
        		'dob' => '1994-06-04',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 6788, Bungoma',
        		'history' => 'N/A',
        		'email' => 'maryn@gmail.com',
        		'stream_id' => 1,
        		'bg_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Mary0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Jackline Filomena Ayimba',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0720665432',
        		'admission_no' => '00124563',
        		'dob' => '1994-09-05',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 7865, Bungoma',
        		'history' => 'N/A',
        		'email' => 'jacklinea@gmail.com',
        		'stream_id' => 1,
        		'bg_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Jackline0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Jane Anita Wangwe',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0721887965',
        		'admission_no' => '001887654',
        		'dob' => '2005-08-03',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 7743, Bungoma',
        		'history' => 'N/A',
        		'email' => 'janea@gmail.com',
        		'stream_id' => 1,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Jane0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Irene Nafula Wafula',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0700675432',
        		'admission_no' => '0019087',
        		'dob' => '2005-09-08',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 7865, Bungoma',
        		'history' => 'N/A',
        		'email' => 'irenen@gmail.com',
        		'stream_id' => 1,
        		'bg_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Irene0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Janepher Atieno Omondi',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0701226784',
        		'admission_no' => '0019075',
        		'dob' => '2005-08-05',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 8853, Bungoma',
        		'history' => 'N/A',
        		'email' => 'janepher@gmail.com',
        		'stream_id' => 2,
        		'bg_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Janepher0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Gladys Aisha Mulinge',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0724678890',
        		'admission_no' => '0017890',
        		'dob' => '2005-06-09',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 87689, Bungoma',
        		'history' => 'N/A',
        		'email' => 'gladys@gmail.com',
        		'stream_id' => 2,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Gladys0000**'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'Benedict Wafula Wabwoba',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0701234563',
        		'admission_no' => '0012578',
        		'dob' => '2005-08-08',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 9067, Bungoma',
        		'history' => 'N/A',
        		'email' => 'benedict@gmail.com',
        		'stream_id' => 2,
        		'bg_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Benedict0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Mecyline Wanjiru Wamboi',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0700654588',
        		'admission_no' => '00166454',
        		'dob' => '2005-03-09',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 8876, Bungoma',
        		'history' => 'N/A',
        		'email' => 'mecyline@gmail.com',
        		'stream_id' => 2,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Mecyline0000**'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'Joseph Barasa Kundu',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0790345677',
        		'admission_no' => '0018845',
        		'dob' => '2005-09-05',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 4134, Bungoma',
        		'history' => 'N/A',
        		'email' => 'joseph@gmail.com',
        		'stream_id' => 2,
        		'bg_id' => 3,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Joseph0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Gentrix Shisia Isindu',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0745678890',
        		'admission_no' => '001884532',
        		'dob' => '2005-09-03',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 9054, Bungoma',
        		'history' => 'N/A',
        		'email' => 'gentrix@gmail.com',
        		'stream_id' => 2,
        		'bg_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Gentrix0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Jane Maimuna Wangwe',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0710908867',
        		'admission_no' => '0019976',
        		'dob' => '2005-09-04',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 8976, Bungoma',
        		'history' => 'N/A',
        		'email' => 'janemw@gmail.com',
        		'stream_id' => 3,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Janem0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Phanice Nasanbu Wabwile',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0712786654',
        		'admission_no' => '0014367',
        		'dob' => '2005-09-06',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 8896, Bungoma',
        		'history' => 'N/A',
        		'email' => 'phanice@gmail.com',
        		'stream_id' => 3,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Phanice0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Getrude Jerubo Ogamba',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0702456734',
        		'admission_no' => '0017856',
        		'dob' => '2005-07-04',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 5201, Bungoma',
        		'history' => 'N/A',
        		'email' => 'getrude@gmail.com',
        		'stream_id' => 3,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Getrude0000**'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'Ali Mohammed Mwani',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0701227891',
        		'admission_no' => '00100453',
        		'dob' => '2005-08-04',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 4792, Bungoma',
        		'history' => 'N/A',
        		'email' => 'ali@gmail.com',
        		'stream_id' => 3,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 2,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Ali0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Caroline Shinyaga Wagabi',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0712345687',
        		'admission_no' => '001886324',
        		'dob' => '2005-05-04',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 9906, Bungoma',
        		'history' => 'N/A',
        		'email' => 'caroline@gmail.com',
        		'stream_id' => 3,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('caroline0000**'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'James Muli Mulinge',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0700678890',
        		'admission_no' => '0018955',
        		'dob' => '2005-07-05',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 9056, Bungoma',
        		'history' => 'N/A',
        		'email' => 'jamesm@gmail.com',
        		'stream_id' => 3,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('James0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Milca Ayimba Mwaniki',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0700567890',
        		'admission_no' => '0013581',
        		'dob' => '2005-05-05',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 9036, Bungoma',
        		'history' => 'N/A',
        		'email' => 'milca@gmail.com',
        		'stream_id' => 4,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Milca0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Christine Jeruto Cherop',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '07889654',
        		'admission_no' => '0019043',
        		'dob' => '2005-06-09',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 6784, Bungoma',
        		'history' => 'N/A',
        		'email' => 'christinej@gmail.com',
        		'stream_id' => 4,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Christine0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Phillis Nasimiyi Wanyonyi',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0710678654',
        		'admission_no' => '0019543',
        		'dob' => '2005-04-10',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 8626, Bungoma',
        		'history' => 'N/A',
        		'email' => 'phillisn@gmail.com',
        		'stream_id' => 4,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Phillis0000**'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'Morris Wafula Watila',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '07906743',
        		'admission_no' => '001342',
        		'dob' => '2005-07-08',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 5732, Bungoma',
        		'history' => 'N/A',
        		'email' => 'morrisw@gmail.com',
        		'stream_id' => 4,
        		'bg_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Morris0000**'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'Johnstone Kamau Ndunge',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'phone_no' => '0712907654',
        		'admission_no' => '0019076',
        		'dob' => '2005-04-12',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 1856, Bungoma',
        		'history' => 'N/A',
        		'email' => 'johnstone@gmail.com',
        		'stream_id' => 4,
        		'bg_id' => 2,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Johnstone0000**'),
        	],

        	[
        		'title' => 'Miss.',
        		'name' => 'Breakcides Waliaula Wafula',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'phone_no' => '0723564387',
        		'admission_no' => '0019067',
        		'dob' => '2005-09-05',
        		'doa' => '2021-03-07',
        		'address' => 'P.O Box 9045, Bungoma',
        		'history' => 'N/A',
        		'email' => 'breakcides@gmail.com',
        		'stream_id' => 4,
        		'bg_id' => 1,
        		'school_id' => 1,
        		'intake_id' => 1,
        		'dormitory_id' => 1,
        		'intake_id' => 1,
        		'admin_id' => 1,
        		'parent_id' => 1,
        		'position_student_id' => 3,
        		'password' => Hash::make('Breakcides0000**'),
        	],
        ];

        Student::insert($students);
    }
}
