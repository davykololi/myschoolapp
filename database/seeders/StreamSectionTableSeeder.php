<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\StreamSection;
use Illuminate\Database\Seeder;

class StreamSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('stream_sections')->delete();

        $streamSections = [
        	[
        		'name' => 'North',
        		'desc' => 'The north stream classes',
        		'initials' => 'N',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'South',
        		'desc' => 'The south stream classes',
        		'initials' => 'S',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'West',
        		'desc' => 'The west stream classes',
        		'initials' => 'W',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'East',
        		'desc' => 'The east stream classes',
        		'initials' => 'E',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        StreamSection::insert($streamSections);
    }
}
