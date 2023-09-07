<?php

namespace Database\Seeders;

use DB;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Accountant;
use Illuminate\Database\Seeder;

class AccountantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('accountants')->delete();

        $accountants = [
        	[
        		'salutation' => 'Mr.',
				'first_name' => 'Johnstone',
				'middle_name' => 'Kisija',
				'last_name' => 'Waliaula',
				'blood_group' => 'B',
        		'email' => 'johnstone@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'id_no' => '22678900',
        		'emp_no' => '894321',
        		'dob' => '20/07/1980',
        		'designation' => 'CPA1',
        		'address' => 'P.O Box 77356, Bungoma',
        		'phone_no' => '0721896532',
        		'role' => 'senioraccountant',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Johnstone0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mrs.',
				'first_name' => 'Christine',
				'middle_name' => 'Nakhumicha',
				'last_name' => 'Wafula',
				'blood_group' => 'A',
        		'email' => 'christine@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '27654323',
        		'emp_no' => '098976',
        		'dob' => '17/10/1979',
        		'designation' => 'CPA2',
        		'address' => 'P.O Box 9067, Kakamega',
        		'phone_no' => '0727990769',
        		'role' => 'deputysenioraccountant',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Christine0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Accountant::insert($accountants);
    }
}
