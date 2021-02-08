<?php

return [
    'money' => [
        'min' => env('PRIZE_MONEY_MIN', 1000),
        'max' => env('PRIZE_MONEY_MAX', 100000),
    ],
    'points' => [
        'min' => env('PRIZE_POINTS_MIN', 10),
        'max' => env('PRIZE_POINTS_MAX', 1000),
        'convert_k' => env('PRIZE_POINTS_CONVERT_K', 10),
    ],
];
