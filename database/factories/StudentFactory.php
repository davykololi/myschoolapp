<?php

namespace Database\Factories;

use Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'title' => $this->faker->sentence,
            'image' => 'student.png',
            'phone_no' => '0735675879',
            'admission_no' => '0010/2021',
            'dob' => now()->subYear(20),
            'doa' => now(),
            'email' => $this->faker->unique()->safeEmail,
            'postal_address' => Str::random(5),
            'history' => $this->faker->text,
            'school_id' => 1,
            'stream_id' => 1,
            'intake_id' => 1,
            'dormitory_id' => 2,
            'admin_id' => 1,
            'parent_id' => 1,
            'position_student_id' => 3,
            'password' => Hash::make('password@123'),
            'remember_token' => Str::random(10),
        ];
    }
}
