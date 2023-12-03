<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use App\Models\Year;
use Illuminate\Database\Seeder;

class YearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('years')->delete();

        $years = [
        	[
        		'year' => '2021',
        		'desc' => 'The year 2021',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'year' => '2022',
        		'desc' => 'The year 2022',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'year' => '2023',
        		'desc' => 'The year 2023',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Year::insert($years);
    }
}
