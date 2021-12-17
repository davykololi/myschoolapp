<?php

namespace Database\Seeders;

use DB;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\MyParent;
use Illuminate\Database\Seeder;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('parents')->delete();

        $parents = [
        	[
        		'title' => 'Mrs.',
        		'name' => 'Annet Waucho Jomba',
        		'email' => 'annetj@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '21876534',
        		'emp_no' => '09675435',
        		'dob' => '1978-07-08',
        		'designation' => 'Farmer',
        		'address' => 'P.O Box 3478, Bungoma',
        		'phone_no' => '0724785432',
        		'bg_id' => 1,
        		'school_id' => 1,
        		'password' => Hash::make('Annet0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        MyParent::insert($parents);
    }
}
