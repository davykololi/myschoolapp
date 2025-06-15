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
                'class_teacher' => 'Mrs. Irene Aoko Auma',
                'class_prefect' => 'Antony Karanja Macho',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 1,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form One South',
                'class_teacher' => 'Mr. Julius Juma Kisilu',
                'class_prefect' => 'Moses Pinto Asili',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 2,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form One West',
                'class_teacher' => 'Mrs. Glady Nafula Barasa',
                'class_prefect' => 'Adelaide Wafula Juma',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 3,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form One East',
                'class_teacher' => 'Mr. Bramuel Mwasi Juma',
                'class_prefect' => 'Linda Nafula Barasa',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 4,
        		'school_id' => 1,
        		'class_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two North',
                'class_teacher' => 'Mr. Jesse Dominick Mwambulu',
                'class_prefect' => 'Pinto Mwamuzi Muli',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 1,
        		'school_id' => 1,
        		'class_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two South',
                'class_teacher' => 'Mr. Cleophas Kamau Kombo',
                'class_prefect' => 'George Wamusili Kinda',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 2,
        		'school_id' => 1,
        		'class_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two West',
                'class_teacher' => 'Mrs. Annet Maimuna Mukasa',
                'class_prefect' => 'Hellen Esha Wafula',
        		'code' => strtoupper(Str::random(15)),
        		'stream_section_id' => 3,
        		'school_id' => 1,
        		'class_id' => 2,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Form Two East',
                'class_teacher' => 'Mrs. Phanice Nanyama Mulongo',
                'class_prefect' => 'Jane Maimuna Kizito',
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
