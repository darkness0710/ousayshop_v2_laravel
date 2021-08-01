<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	\DB::table('admins')->truncate();

        \App\Models\Admin::create([
        	'email' => 'admin@gmail.com',
            'name' => 'admin',
        	'password' => \Hash::make('adminxyz'),
        ]);
    }
}
