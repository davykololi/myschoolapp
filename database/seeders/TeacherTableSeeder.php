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
        		'title' => 'Mrs.',
        		'name' => 'Jackline Wangeshi Kamau',
        		'email' => 'jackline12@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '21875645',
        		'emp_no' => '68005434',
        		'dob' => '1975-08-02',
        		'designation' => 'P1 Teacher',
        		'address' => 'P.O Box 7420, Nairobi',
        		'phone_no' => '0724659933',
        		'history' => 'N/A',
        		'bg_id' => 2,
        		'school_id' => 1,
        		'position_teacher_id' => 1,
        		'password' => Hash::make('Jacklinew0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'title' => 'Mr.',
        		'name' => 'Benjamin Waliaula Watah',
        		'email' => 'benjaminw@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'id_no' => '25347689',
        		'emp_no' => '9789045',
        		'dob' => '1982-09-04',
        		'designation' => 'P1 Teacher',
        		'address' => 'P.O Box 8867, Nairobi',
        		'phone_no' => '0726879099',
        		'history' => 'N/A',
        		'bg_id' => 1,
        		'school_id' => 1,
        		'position_teacher_id' => 2,
        		'password' => Hash::make('Bejaminw0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Teacher::insert($teachers);
    }
}
