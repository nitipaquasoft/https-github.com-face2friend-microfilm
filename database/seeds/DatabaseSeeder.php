<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'label' => 'Admin',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'User',
                'label' => 'User',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'VideoUploader',
                'label' => 'VideoUploader',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $data = [
            'username' => 'admin',
            'email' => 'admin@microfilm.com',
            'password' => Hash::make('12345678'),
                // 'phone' => '98166422',
        ];
        $user = \App\User::create($data);
        $user->assignRole('Admin');
        
        
      
        
        
        
        
        
        
        
        
        
    }

}
