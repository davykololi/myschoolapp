<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Dormitory;
use Illuminate\Database\Seeder;

class DormitoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dormitories')->delete();

        $dormitories = [
        	[
        		'name' => 'Mt. Elgon',
        		'code' => strtoupper(Str::random(15)),
        		'bed_no' => 78,
        		'dom_head' => 'Mrs. Jane Kansime',
        		'ass_head' => 'Mrs. Anne Wanjiru',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'name' => 'Mt. Kilimanjaro',
        		'code' => strtoupper(Str::random(15)),
        		'bed_no' => 85,
        		'dom_head' => 'Mrs. Melvina Wafula',
        		'ass_head' => 'Mrs. Janet Wetah',
        		'school_id' => 1,
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Dormitory::insert($dormitories);
    }
}
