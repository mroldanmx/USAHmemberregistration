<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registration_types = [
            [
                'type' => 'Myself',
                'terms' => '',
            ],
            [
                'type' => 'Child Family Member (Under 18)',
                'terms' => '',
            ],
            [
                'type' => 'Adult Family Member (18 and over)',
                'terms' => 'Each registrant must be present to acknowledge waivers.',
            ],
            [
                'type' => 'Adult Family Member (18 and over)',
                'terms' => "Each person being registered needs to be present to accept the USA Hockey Waiver of Liability and the USA Hockey Concussion Information and Acknowledgement. Also, be sure to provide each person's correct mailing address and personal email address so that confirmation of registration can be delivered. ",
            ],
        ];
        $table = DB::table('registration_type');

        foreach ($registration_types as $registration_type) {
            $registration_type['created_at'] = date('Y-m-d H:i:s');
            $table->insert($registration_type);
        }
    }
}
