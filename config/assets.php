<?php 

return [
    /*
    |--------------------------------------------------------------------------
    | Application Default Profile Image Assets
    |--------------------------------------------------------------------------
    |
    | This section declare application default image files location. 
    |
    */
    'user'  => [
        'male'      => '/images/default/users/male.svg',
        'female'    => '/images/default/users/female.svg',
        'other'     => '/images/default/placeholder/camera.svg',
    ],


    /*
    |--------------------------------------------------------------------------
    | Application Default Placeholder Image Assets
    |--------------------------------------------------------------------------
    |
    | This section declare application placeholder default image files location. 
    |
    */
    'placeholder'   => '/images/default/placeholder/camera.svg',

    /*
    |--------------------------------------------------------------------------
    | Application Files Path Store Drive
    |--------------------------------------------------------------------------
    |
    | This section register application files path store drive. Ex: storage, public etc.
    |
    */
    'file-store-drive'  => 'storage',

    /*
    |--------------------------------------------------------------------------
    | Application Files Path Folder Location
    |--------------------------------------------------------------------------
    |
    | This section register application files path folder location using key,value pair. 
    |
    */
    'paths'     => [
        'user-profile'      => [
            'path'   => '/images/users',
        ],
    ]

];