<?php

namespace Database\Seeders;

use DB;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('staffs')->delete();

        $staffs = [
        	[
        		'salutation' => 'Mrs.',
				'first_name' => 'Metrine',
				'middle_name' => 'Akinyi',
				'last_name' => 'Opiyo',
				'blood_group' => 'A',
        		'email' => 'metrinea@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '22675432',
        		'emp_no' => '760912',
        		'dob' => '12/07/1982',
        		'designation' => 'Secretariat Course',
        		'address' => 'P.O Box 5634, Kisumu',
        		'phone_no' => '0722539067',
        		'role' => 'schoolsecretary',
        		'history' => 'N/A',
        		'school_id' => 1,
                'superadmin_id' => 1,
        		'password' => Hash::make('Metrine0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Daniel',
				'middle_name' => 'Koril',
				'last_name' => 'Chesang',
				'blood_group' => 'A',
        		'email' => 'daniel@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'id_no' => '24678900',
        		'emp_no' => '893201',
        		'dob' => '11/12/1984',
        		'designation' => 'Farmer',
        		'address' => 'P.O Box 8906, Bungoma',
        		'phone_no' => '0724190064',
        		'role' => 'gardener',
        		'history' => 'N/A',
        		'school_id' => 1,
                'superadmin_id' => 1,
        		'password' => Hash::make('Daniel0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Staff::insert($staffs);
    }
}
