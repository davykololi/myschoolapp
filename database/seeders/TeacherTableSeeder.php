<?php

namespace Database\Seeders;

use DB;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teachers')->delete();

        $teachers = [
        	[
        		'salutation' => 'Mrs.',
				'first_name' => 'Jackline',
				'middle_name' => 'Wangashi',
				'last_name' => 'Kamau',
				'blood_group' => 'B',
        		'email' => 'jackline12@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '21875645',
        		'emp_no' => '68005434',
        		'dob' => '1975-08-02',
        		'designation' => 'P1 Teacher',
        		'address' => 'P.O Box 7420, Nairobi',
        		'phone_no' => '0724659933',
        		'role' => 'headteacher',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Jacklinew0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Benjamin',
				'middle_name' => 'Waliaula',
				'last_name' => 'Watah',
				'blood_group' => 'B',
        		'email' => 'benjaminw@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'id_no' => '25347689',
        		'emp_no' => '9789045',
        		'dob' => '1982-09-04',
        		'designation' => 'P1 Teacher',
        		'address' => 'P.O Box 8867, Nairobi',
        		'phone_no' => '0726879099',
        		'role' => 'deputyheadteacher',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Bejaminw0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mrs.',
				'first_name' => 'Janet',
				'middle_name' => 'Marion',
				'last_name' => 'Watila',
				'blood_group' => 'B',
        		'email' => 'janetm@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '25768945',
        		'emp_no' => '9704500',
        		'dob' => '1986-09-05',
        		'designation' => 'P1 Teacher',
        		'address' => 'P.O Box 5643, Nairobi',
        		'phone_no' => '0723563412',
        		'role' => 'classteacher',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Janetm0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'John',
				'middle_name' => 'Walioba',
				'last_name' => 'Olalo',
				'blood_group' => 'B+',
        		'email' => 'johnw@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'id_no' => '22768095',
        		'emp_no' => '7604543',
        		'dob' => '1984-10-07',
        		'designation' => 'P1 Teacher',
        		'address' => 'P.O Box 956, Bungoma',
        		'phone_no' => '0711890056',
        		'role' => 'staffteacher',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Johnw0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Teacher::insert($teachers);
    }
}
