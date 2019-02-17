<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('users');

        $table->insert([
            'name' => 'System',
            'email' => 'system@usahockey.com',
            'password' => Hash::make('hockeydisk-13'),

        ]);
    }
}
