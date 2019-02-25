<?php

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
        $this->call([
            RegistrationTypeTableSeeder::class,
            MemberTypeTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            MembersTableSeeder::class,
            TermsTableSeeder::class,
            WaiversTableSeeder::class,
            ConcussionTableSeeder::class,
            DonationTypeSeeder::class,
        ]);
    }
}
