<?php

namespace Database\Seeders;

use Hash;
use DB;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->delete();

        $admins = [
        	[
        		'title' => 'School Administrator',
        		'name' => 'Jack Kioko Kamau',
        		'email' => 'jack@gmail.com',
        		'image' => 'image.png',
        		'gender' => 'Male',
        		'id_no' => '26789065',
                'dob' => '1979-09-08',
        		'emp_no'=> '905674325',
        		'designation' => 'Engineer',
        		'address' => 'P.P Box 9678, Bungoma',
        		'phone_no' => '0743267890',
        		'history' => 'N/A',
        		'school_id' => 1,
        		'superadmin_id' => 1,
        		'password' => Hash::make('Jack0000**'),
        	]
        ];

        Admin::insert($admins);
    }
}
