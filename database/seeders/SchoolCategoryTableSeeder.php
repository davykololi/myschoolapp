<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\CategorySchool;
use Illuminate\Database\Seeder;

class SchoolCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category_schools')->delete();

        $schoolCategories = [
        	[
        		'name' => 'National',
        		'desc' => 'The category for national schools',
        		'slug' => Str::slug('National','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'County',
        		'desc' => 'The category for county schools',
        		'slug' => Str::slug('County','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Private',
        		'desc' => 'The category for private schools',
        		'slug' => Str::slug('Private','-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        CategorySchool::insert($schoolCategories);
    }
}
