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
        			'name' => 'David Misiko Kololi',
        			'email' => 'kololimdavid@gmail.com',
        			'title' => 'Engineer',
        			'address' => '688 Bungoma, Kenya',
        			'password' => Hash::make('kenyayangu17'),
        			]); 
    }
}
