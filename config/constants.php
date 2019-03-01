<?php
return [
    "contact" => [
        "tel" => [
            "number" => "18005663288,ext=123",
            "label" => "1-800-566-3288 ext 123",
        ],
        "email" => "memberservices@usahockey.org",
    ],
    "support_email" => env('SUPPORT_EMAIL'),
    "member_types" => [
        "Player" => 1,
        "Manager" => 2,
        "Official" => 3,
    ],
    "registration_type" => [
        "Myself" => 1,
        "Child" => 2,
        "Adult" => 3,
        "Adult-Non-Family" => 4,
    ],
    "citizenship" => [
        'USA' => 1,
        'Canada' => 2,
        'Other' => 3,
    ],
    "gender" => [
        'Male' => 'M',
        'Female' => 'F',
    ],
    "age_for_adults" => 18,
    "diversityTypes" => [
        "American Indian or Alaska Native",
        "Asian",
        "Black or African American",
        "Native Hawaiian or Other Pacific Islander",
        "Hispanic or Latino",
        "White (not of Hispanic origin)",
        "Two or more races",
        "I would prefer not to share this information",
        "Other",
    ],
    "registration" => [
        "CREATED" => "CREATED",
        "IN-CART" => 'IN-CART',
        "PAID" => "PAID",

    ],
    "cart" => [
        "CREATED" => "CREATED",
        "COMPLETE" => 'COMPLETE',
    ],
    "member_pricing" => [
        "Player" => [
            "Regular" => 40.00,
        ],
        "Manager" => [
            "Regular" => 0.00,
        ],
        "Official" => [
            "Level_1" => 45.00,
            "Affiliated" => 30.00,
        ],
        "1" => [
            "Regular" => 90.00,
        ],
        2 => [
            "Regular" => 0.00,
        ],
        3 => [
            "Level_1" => 45.00,
            "Affiliated" => 30.00,
        ],
    ],
    "affiliate_pricing" => [
        "Mid-American District" => [
            "Regular" => 10.00,
        ],
    ],
    "emails" => [
        "registration" => 'welcome@usahockey.com',
    ],
    "contries" => [
        "US" => "United States",
        "CA" => "Canada",
    ],

];