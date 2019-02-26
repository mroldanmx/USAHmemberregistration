<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemPreferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sysval = [
            [
                'application' => 'billing',
                'keyword' => 'USA Hockey',
                'value' => 'This is some description for USA Hockey Billing Fee',
            ],
            [
                'application' => 'billing',
                'keyword' => 'Affiliate',
                'value' => 'This is some description for Affiliate Billing Fee',
            ],
            [
                'application' => 'billing',
                'keyword' => 'USA Hockey Foundation',
                'value' => 'This is some description for USA Hockey Foundation Billing Fee',
            ],

        ];
        $table = DB::table('system_preferences');

        foreach ($sysval as $record) {
            $record['created_at'] = date('Y-m-d H:i:s');
            $table->insert($record);
        }
    }
}
