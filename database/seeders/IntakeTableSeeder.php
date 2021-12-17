<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Intake;
use Illuminate\Database\Seeder;

class IntakeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('intakes')->delete();

        $intakes = [
        	[
        		'name' => 'March Intake',
        		'desc' => 'The intake for the month of March',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'September Intake',
        		'desc' => 'The intake for the month of September',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Intake::insert($intakes);
    }
}
