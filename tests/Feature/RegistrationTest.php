<?php

namespace Tests\Feature;

use Tests\TestCase;


class RegistrationTest extends TestCase
{


    public function testStep1()
    {
        $response = $this->json('POST',
            '/api/register',
            [
                'age_requirement' => true,
                'is_returning_official' => true,
            ]
        );

        $response
            ->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'age_requirement' => [trans('registration.18_or_older')],
                    'official_number' => '',
                ],
            ]);
    }
}
