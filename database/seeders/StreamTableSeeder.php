<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Stream;
use Illuminate\Database\Seeder;

class StreamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('streams')->delete();

        $streams = [
        	[
        		'name' => 'Form One North',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 1,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form One South',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 2,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form One West',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 3,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form One East',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 4,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two North',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 1,
        		'school_id' => 1,
        		'class_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two South',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 2,
        		'school_id' => 1,
        		'class_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two West',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 3,
        		'school_id' => 1,
        		'class_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two East',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 4,
        		'school_id' => 1,
        		'class_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Stream::insert($streams);
    }
}
