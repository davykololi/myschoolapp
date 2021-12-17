<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\MyClass;
use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('classes')->delete();

        $classes = [
        	[
        		'name'  => 'Form One',
        		'desc' => 'Form One classes',
        		'slug' => Str::slug('Form One','-'),
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Form Two',
        		'desc' => 'Form Two classes',
        		'slug' => Str::slug('Form Two','-'),
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Form Three',
        		'desc' => 'Form Three classes',
        		'slug' => Str::slug('Form Three','-'),
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name'  => 'Form Four',
        		'desc' => 'Form Four classes',
        		'slug' => Str::slug('Form Four','-'),
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        MyClass::insert($classes);
    }
}
