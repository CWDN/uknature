<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'email' => 'jezza126@gmail.com',
            'name' => 'Jeremy',
            'password' => Hash::make('password')
        ]);
    }

}