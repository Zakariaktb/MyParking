<?php

return [
    'pk' => env('STRIPE_PK'),
    'sk' => env('STRIPE_SK'),
    'secret_key' => config('services.stripe.secret'),
    'publishable_key' => config('services.stripe.key'),
];
