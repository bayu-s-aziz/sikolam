<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Sikolam_Admin',
            'name' => 'Bayu Septiana Aziz',
            'email' => 'admin@sikolam.com',
            'password' => bcrypt('secret')
        ]);
    }
}
