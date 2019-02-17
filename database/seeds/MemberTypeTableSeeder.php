<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $member_types = [
            [
                'type' => 'Player/Coach',
                'description' => 'A Hockey player or Coach',
            ],
            [
                'type' => 'Manager/Volunteer',
                'description' => 'A Hockey Manager or Volunteer',
            ],
            [
                'type' => 'Official (Referees)',
                'description' => 'A Hockey Officer (returning or new)',
            ],
        ];
        $table = DB::table('member_type');

        foreach ($member_types as $member_type) {
            $member_type['created_at'] = date('Y-m-d H:i:s');
            $table->insert($member_type);
        }
    }
}

