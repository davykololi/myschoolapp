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
        		'start_date' => '2021-04-12',
        		'end_date' => '2021-04-20',
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
        		'start_date' => '2021-06-09',
        		'end_date' => '2021-06-17',
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
        		'start_date' => '2021-08-15',
        		'end_date' => '2021-08-24',
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
