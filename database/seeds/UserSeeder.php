<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->insert([
        //     'name' => 'bhautik',
        //     'email' => 'bhautik12@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'bhautik',
        //     'email' => 'bhautik21@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

       
            DB::table('users')->insert([
                'name' => "bhautik",
                'email' =>'bhautik@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'remember_token' => Str::random(10),
            ]);
        

        
    }
}