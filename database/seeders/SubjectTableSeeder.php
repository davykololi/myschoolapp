<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->delete();

        $subjects = [
        	[
        		'name'  => 'Mathematics',
                'type' => 'Compulsary',
        		'code' => '121',
        		'department_id' => 3,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'English',
                'type' => 'Languages',
        		'code' => '101',
        		'department_id' => 2,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Kiswahili',
                'type' => 'Languages',
        		'code' => '102',
        		'department_id' => 2,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Chemistry',
                'type' => 'Sciences',
        		'code' => '233',
        		'department_id' => 1,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Biology',
                'type' => 'Sciences',
        		'code' => '231',
        		'department_id' => 1,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Physics',
                'type' => 'Sciences',
        		'code' => '232',
        		'department_id' => 1,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'CRE',
                'type' => 'Humanities',
        		'code' => '313',
        		'department_id' => 5,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Islam',
                'type' => 'Humanities',
        		'code' => '314',
        		'department_id' => 5,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Geography',
                'type' => 'Humanities',
        		'code' => '312',
        		'department_id' => 4,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'History',
                'type' => 'Humanities',
        		'code' => '311',
        		'department_id' => 4,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

            [
                'name'  => 'Home Science',
                'type' => 'Technical',
                'code' => '441',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Art And Design',
                'type' => 'Technical',
                'code' => '442',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Agriculture',
                'type' => 'Technical',
                'code' => '443',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Business Studies',
                'type' => 'Technical',
                'code' => '565',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Computer Studies',
                'type' => 'Technical',
                'code' => '451',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Drawing And Design',
                'type' => 'Technical',
                'code' => '449',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'French',
                'type' => 'Foreign Languages',
                'code' => '501',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'German',
                'type' => 'Foreign Languages',
                'code' => '502',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Arabic',
                'type' => 'Foreign Languages',
                'code' => '503',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Sign Language',
                'type' => 'Foreign Languages',
                'code' => '504',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Music',
                'type' => 'Foreign Languages',
                'code' => '511',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Wood Work',
                'type' => 'Technical',
                'code' => '444',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Metal Work',
                'type' => 'Technical',
                'code' => '445',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Building Construction',
                'type' => 'Technical',
                'code' => '446',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Power Mechanics',
                'type' => 'Technical',
                'code' => '447',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Electricity',
                'type' => 'Technical',
                'code' => '448',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name'  => 'Aviation Technology',
                'type' => 'Technical',
                'code' => '450',
                'department_id' => 4,
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Subject::insert($subjects);
    }
}
