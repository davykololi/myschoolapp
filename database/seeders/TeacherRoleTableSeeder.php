<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PositionTeacher;
use Illuminate\Database\Seeder;

class TeacherRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('position_teachers')->delete();

    	$teacherRoles = [
    		[
    			'name' => 'The Principal',
    			'desc' => 'The teacher heading the school',
    			'slug' => Str::slug('The Principal','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'name' => 'The Deputy Principal',
    			'desc' => 'The teacher assisting The Principal to head the school',
    			'slug' => Str::slug('The Deputy Principal','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'name' => 'The Head Science Department',
    			'desc' => 'The teacher heading The Science Department',
    			'slug' => Str::slug('The Head Scince Department','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'name' => 'The Assistand Head Science Department',
    			'desc' => 'The teacher who is the assitant to The Head Science Department',
    			'slug' => Str::slug('The Assistand Head Science Department','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'name' => 'The Head Languages Department',
    			'desc' => 'The teacher heading The Languages Department',
    			'slug' => Str::slug('The Head Languages Department','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'name' => 'The Assistand Head Languages Department',
    			'desc' => 'The teacher who is the assitant to The Head Languages Department',
    			'slug' => Str::slug('The Assistand Head Languages Department','-'),
    			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],
    	];

    	PositionTeacher::insert($teacherRoles);
    }
}
