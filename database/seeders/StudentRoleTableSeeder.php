<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PositionStudent;
use Illuminate\Database\Seeder;

class StudentRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('position_students')->delete();

        $studentRoles = [
    		[
    			'name' => 'The Head Girl',
    			'desc' => 'The student heading the school in a girl school',
    			'slug' => Str::slug('The Head Girl','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'name' => 'The Assistant Head Girl',
    			'desc' => 'The student assisting The Head Girl to head the school',
    			'slug' => Str::slug('The Assistant Head Girl','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'name' => 'The Ordinary Student',
    			'desc' => 'The ordinary student with no adminsterial role in school',
    			'slug' => Str::slug('The Ordinary Student','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],
    	];

    	PositionStudent::insert($studentRoles);
    }
}
