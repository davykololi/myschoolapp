<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->delete();

        $departments = [
        	[
        		'name' => 'Science Department',
        		'code' => strtoupper(Str::random(15)),
        		'phone_no' => '0756453278',
        		'head_name' => 'Mr. Cleophas Malala',
        		'asshead_name' => 'Mrs. Glady Sholei',
        		'motto' => 'The world needs science in every aspect',
        		'vision' => 'To impact the best science knowlegde to our students',
        		'mission' => 'to be the leading institution in science in Kenya',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Languages Department',
        		'code' => strtoupper(Str::random(15)),
        		'phone_no' => '0756453278',
        		'head_name' => 'Mr. Granton Samboja',
        		'asshead_name' => 'Mr. Alfred Keter',
        		'motto' => 'The languages unite the world',
        		'vision' => 'To provide the best languages experiences to our students',
        		'mission' => 'to be the leading institution in languages in Kenya',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Mathematics Department',
        		'code' => strtoupper(Str::random(15)),
        		'phone_no' => '0745678883',
        		'head_name' => 'Mr. James Waliaula',
        		'asshead_name' => 'Mr. Jane Wabwoba',
        		'motto' => 'Mathematics Rotates The World',
        		'vision' => 'To provide the best mathematical knowledge to our learners',
        		'mission' => 'to be the leading institution in mathematics in Kenya',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Department::insert($departments);
    }
}
