<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create([
            'name' => 'Super Admin', 
            'slug' => 'super-admin',
            'permissions' => [
                'root-access' => true,
            ]
        ]);

        $memberServicers = Role::create([
            'name' => 'Member Servicer', 
            'slug' => 'member-servicer',
            'permissions' => [
                'create-member' => true,
                'edit-member' => true,
            ]
        ]);

        $member = Role::create([
        	'name' => 'Member', 
            'slug' => 'member',
            'permissions' => [
            	'update-profile' => true,
            	'reset-password' => true
            ]
        ]);
    }
}
