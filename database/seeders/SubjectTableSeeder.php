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
                'type' => 'Mathematics',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 3,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'English',
                'type' => 'Languages',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 2,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Kiswahili',
                'type' => 'Languages',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 2,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Chemistry',
                'type' => 'Sciences',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 1,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Biology',
                'type' => 'Sciences',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 1,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Physics',
                'type' => 'Sciences',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 1,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'CRE',
                'type' => 'Religious',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 5,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Islam',
                'type' => 'Religious',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 5,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Geography',
                'type' => 'Humanities',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 4,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'History',
                'type' => 'Humanities',
        		'code' => strtoupper(Str::random(15)),
        		'department_id' => 4,
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Subject::insert($subjects);
    }
}
