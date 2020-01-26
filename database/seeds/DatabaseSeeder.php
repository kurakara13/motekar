<?php

use Illuminate\Database\Seeder;

use App\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->username = 'admin';
        $admin->name = 'Admin';
        $admin->password = Hash::make('secret');
        $admin->save();
    }
}
