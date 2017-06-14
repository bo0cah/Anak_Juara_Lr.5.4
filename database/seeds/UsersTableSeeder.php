<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User([
            'name' => 'admin',
            'email' => 'admin@betuah.com',
            'password' => bcrypt('admin123'),
            'admin' => 1,
        ]);
        $user->save();
        
        $user = new App\User([
            'name' => 'zila',
            'email' => 'zila@betuah.com',
            'password' => bcrypt('zila123'),
            'admin' => 1,
        ]);
        $user->save();
    }
}
