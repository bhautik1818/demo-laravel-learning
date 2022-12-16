<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        // $gender = $faker->randomElement(['male', 'female']);
        // foreach (range(1,100) as $index) {
        //     DB::table('students')->insert([
        //         'firstname' => $faker->name($gender),
        //         'lastname' => $faker->lastname,
        //         'email' => $faker->email,
        //         'username' => $faker->username,
        //         'phone' => $faker->phoneNumber,
        //         'dob' => $faker->date($format = 'Y-m-d', $max = 'now')
        //     ]);
        // }

        DB::table('students')->insert([
            'firstname' => 'bhautik',
            'lastname' => 'savaliya',
            'email' => 'bhautik171999@gmail.com',
            'username' => 'bhautik_patel',
            'phone' => 9595959595,
            'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        ]);
    }
}