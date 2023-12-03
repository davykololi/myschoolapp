<?php

namespace Database\Seeders;

use DB;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Matron;
use Illuminate\Database\Seeder;

class MatronTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('matrons')->delete();

        $matrons = [
        	[
        		'salutation' => 'Mrs.',
				'first_name' => 'Margret',
				'middle_name' => 'Nafula',
				'last_name' => 'Wafula',
				'blood_group' => 'A',
        		'email' => 'margret@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '20675643',
        		'emp_no' => '885678',
        		'dob' => '14/09/1982',
        		'designation' => 'Secretariat Course',
        		'address' => 'P.O Box 6745, Mombasa',
        		'phone_no' => '0723880645',
        		'role' => 'seniormatron',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Margret0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Matron::insert($matrons);
    }
}
