<?php

    return [
        'url' => env('PRESTASHOP_URL', 'https://himart.com.mx'),
        'token' => env('PRESTASHOP_TOKEN', 'I24KTKXC8CLL94ENE1R1MX3SR8Q966H4'),
        'debug' => env('PRESTASHOP_DEBUG', env('APP_DEBUG', true))
    ];

   /* return [
        'url' => env('PRESTASHOP_URL', 'http://tienda.test'),
        'token' => env('PRESTASHOP_TOKEN', 'WUGBV8KVY6ERX77IIXN2QK8T6D8I5BIV'),
        'debug' => env('PRESTASHOP_DEBUG', env('APP_DEBUG', true))
    ];*/
