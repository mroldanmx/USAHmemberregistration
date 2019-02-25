<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $table = DB::table('donation_types');

        $costs = [
            [
                'cost' => 5.00,
            ],
            [
                'cost' => 12.50,
                'description' => '(This donation will allow USA Hockey to gift a stick for a child to try hockey)',
            ],
            [
                'cost' => 50,
            ],
            [
                'cost' => 100,
            ],
        ];

        foreach ($costs as $cost) {
            $cost['created_at'] = date('Y-m-d H:i:s');
            $table->insert($cost);
        }
    }
}
