<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@cp.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
