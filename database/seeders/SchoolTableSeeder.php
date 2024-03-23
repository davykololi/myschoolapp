<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('schools')->delete();

        $schools = [
        	[
        		'name' => 'Lizar Schools Naivasha',
                'type' => 'Private School',
        		'initials' => 'LSN',
        		'code' => strtoupper(Str::random(15)),
        		'head' => 'Mr. Welton Kisaju Mwadime',
        		'ass_head' => 'Mrs. Melvin Awori Omollo',
        		'motto' => 'In Fearing God, Wisdom Begins',
        		'vision' => 'To provide the best education to our students',
        		'mission' => 'To be the best learning institution in Kenya',
        		'email' => 'lizarac@gmail.com',
                'phone_no' => '+254724907865',
        		'postal_address' => 'P.O Box 67099, Naivasha',
        		'core_values' => 'N/A',
        		'image' => 'image.png',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        School::insert($schools);
    }
}
