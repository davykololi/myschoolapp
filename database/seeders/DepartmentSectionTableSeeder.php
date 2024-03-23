<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\DepartmentSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        DB::table('department_sections')->delete();

        $departmentSections = [
            [
                'name' => 'Academic',
                'description' => 'The academic department section',
                'code' => strtoupper(Str::random(15)),
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Special',
                'description' => 'The special department section',
                'code' => strtoupper(Str::random(15)),
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Sports',
                'description' => 'The sports department section',
                'code' => strtoupper(Str::random(15)),
                'school_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DepartmentSection::insert($departmentSections);
    }
}
