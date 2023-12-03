<?php

namespace Database\Seeders;

use DB;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Librarian;
use Illuminate\Database\Seeder;

class LibrarianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('librarians')->delete();

        $librarians = [
        	[
        		'salutation' => 'Mr.',
				'first_name' => 'James',
				'middle_name' => 'Khaemba',
				'last_name' => 'Wafula',
				'blood_group' => 'B',
        		'email' => 'james@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'id_no' => '21306534',
        		'emp_no' => '430967',
        		'dob' => '07/10/1977',
        		'designation' => 'LIB1',
        		'address' => 'P.O Box 3209, Nairobi',
        		'phone_no' => '0725732099',
        		'role' => 'seniorlibrarian',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('James0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mrs.',
				'first_name' => 'Lilian',
				'middle_name' => 'Nafula',
				'last_name' => 'Wafula',
				'blood_group' => 'A',
        		'email' => 'lilian@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Female',
        		'id_no' => '26897543',
        		'emp_no' => '990067',
        		'dob' => '09/09/1978',
        		'designation' => 'LIB2',
        		'address' => 'P.O Box 7600, Bungoma',
        		'phone_no' => '0790675432',
        		'role' => 'assistantseniorlibrarian',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'password' => Hash::make('Lilian0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        Librarian::insert($librarians);
    }
}
