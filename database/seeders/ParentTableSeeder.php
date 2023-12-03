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
        		'salutation' => 'Mrs.',
				'name' => 'Jane Sesha Waudo',
        		'email' => 'janesesha@gmail.com',
        		'image' => 'image.png',
        		'id_no' => '21093201',
        		'phone_no' => '0732564323',
        		'school_id' => 1,
        		'password' => Hash::make('Janesesha0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mrs.',
				'name' => 'Elizabeth Asha Jumba',
        		'email' => 'elizabeth@gmail.com',
        		'image' => 'image.png',
        		'id_no' => '24356789',
        		'phone_no' => '0733210095',
        		'school_id' => 1,
        		'password' => Hash::make('Elizabeth0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'salutation' => 'Mr.',
				'name' => 'Wilber Otieno Omondi',
        		'email' => 'wilbero@gmail.com',
        		'image' => 'image.png',
        		'id_no' => '27235421',
        		'phone_no' => '0722907865',
        		'school_id' => 1,
        		'password' => Hash::make('Wilber0000**'),
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],
        ];

        MyParent::insert($parents);
    }
}
