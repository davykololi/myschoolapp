<?php

namespace Database\Seeders;

use App\Models\Superadmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SuperadminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//
        DB::table('superadmins')->delete();
        Superadmin::create([
        			'first_name' => 'David',
        			'middle_name' => 'Misiko',
        			'last_name' => 'Kololi',
        			'email' => 'kololimdavid@gmail.com',
        			'title' => 'Engineer',
        			'password' => Hash::make('kenyayangu17'),
        			]); 
    }
}
