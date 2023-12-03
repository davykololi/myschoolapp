<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exams')->delete();

        $exams = [
        	[
        		'name' => 'Mid Term Exam',
                'type' => 'Mid Term Examinations',
        		'code' => strtoupper(Str::random(15)),
        		'start_date' => '12/04/2023',
        		'end_date' => '20/04/2023',
        		'school_id' => 1,
        		'year_id' => 2,
        		'term_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'End Term Exam',
                'type' => 'End Term Examinations',
        		'code' => strtoupper(Str::random(15)),
        		'start_date' => '09/06/2023',
        		'end_date' => '17/06/2023',
        		'school_id' => 1,
        		'year_id' => 2,
        		'term_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Mock Exam',
                'type' => 'Mock Examinations',
        		'code' => strtoupper(Str::random(15)),
        		'start_date' => '15/08/2023',
        		'end_date' => '24/08/2023',
        		'school_id' => 1,
        		'year_id' => 2,
        		'term_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Exam::insert($exams);
    }
}
