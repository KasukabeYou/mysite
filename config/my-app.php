<?php
// config/my-app.php

return [
    // configに.envの内容を入れる。
    'ow-ep' => env('OPENWEATHER_ENDPOINT'),
    'ow-at' => env('OPENWEATHER_API_TYPE'),
    'ow-ky' => env('OPENWEATHER_API_KEY'),
    
    'gmap' => [    
      'api_key' => env('GOOGLE_MAP_API_KEY'),  
    ],
];