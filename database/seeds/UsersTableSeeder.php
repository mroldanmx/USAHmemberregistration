<?php

use App\Models\User;
use App\Models\Role;
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

        $superAdminRole = Role::where('slug', 'super-admin')->firstOrFail();
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@integrass.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('hockey'),
        ]);
        $admin->roles()->save($superAdminRole);

        $memberServicerRole = Role::where('slug', 'member-servicer')->firstOrFail();
        $servicer = User::create([
            'name' => 'Member Service',
            'email' => 'memberservice@integrass.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('hockey'),
        ]);
        $servicer->roles()->save($memberServicerRole);

        $memberRole = Role::where('slug', 'member')->firstOrFail();
        $member = User::create([
            'name' => 'Member',
            'email' => 'member@integrass.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('hockey'),
        ]);
        $member->roles()->save($memberRole);
    }
}
