<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            'username' => 'admin',
            'email' => 'admin@microfilm.com',
            'password' => Hash::make('12345678'),
        ];
        $user = \App\User::create($data);
        $user->assignRole('Admin');
    }

}
