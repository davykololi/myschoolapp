<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\CategoryExam;
use Illuminate\Database\Seeder;

class ExamCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category_exams')->delete();

        $examCategories = [
        	[
        		'name' => 'Mock Examination',
        		'desc' => 'The exams done to test the efficiency of students prior to final exams',
        		'slug' => Str::slug('Mock Examination','-'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => "CAT's",
        		'desc' => 'The continous assessment tests done by students at school',
        		'slug' => Str::slug("CATS's",'-'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => "Preliminary Exam",
        		'desc' => 'The exam done by student at the beginning of the term',
        		'slug' => Str::slug("Preliminary Exam",'-'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        CategoryExam::insert($examCategories);
    }
}
