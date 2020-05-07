<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Admin Settings
     |--------------------------------------------------------------------------
     |  Configures the Route group for all Admin pages.
     |
     */
    'routes' => [
        'prefix'    => 'admin',
        'middleware'=> ['web', 'auth']
    ],
];
