<?php 
    return [
        'mercant_id' => env('MID_MERCHANT_ID'),
        'client_key' => env('MID_CLIENT_KEY'),
        'server_key' => env('MID_SERVER_KEY'),
    
        'is_production' => false,
        'is_sanitized' => false,
        'is_3ds' => false,
    ];
?>