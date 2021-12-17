<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\BloodGroup;
use Illuminate\Database\Seeder;

class BloodGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('blood_groups')->delete();

        $bloodGroups = [
        	[
        		'type' => 'A+',
        		'desc' =>'Blood group type "A"',
        		'slug' =>Str::slug('A','-'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'type' => 'B',
        		'desc' =>'Blood group type "B"',
        		'slug' =>Str::slug('B','-'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'type' => 'O',
        		'desc' =>'Blood group type "O"',
        		'slug' =>Str::slug('O','-'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'type' => 'AB',
        		'desc' =>'Blood group type "AB"',
        		'slug' =>Str::slug('AB','-'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        BloodGroup::insert($bloodGroups);
    }
}
