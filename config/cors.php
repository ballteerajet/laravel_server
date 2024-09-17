<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'csrf-token'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost'], // เปลี่ยนเป็น 'http://localhost'
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // เปิดใช้ในกรณีที่คุณต้องการให้ทำงานกับการส่ง cookie หรือ CSRF token
];