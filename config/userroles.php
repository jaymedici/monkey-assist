<?php

return [
    /*
    |--------------------------------------------------------------------------
    | System User Roles
    |--------------------------------------------------------------------------
    |
    | Define all the roles you're gonna need for your system here
    |
    */
    'roles' => [
        'Admin'
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    |
    | Define all permissions that will be used in the system here
    |
    */
    'permissions' => [
        'view all tickets',
        'modify users'
    ],

    /*
    |--------------------------------------------------------------------------
    | Role - Permission Mapper
    |--------------------------------------------------------------------------
    |
    | For each role you've created, identify its associated permissions
    | NB: Make sure the role and permission names match the ones you provided above and
    |
    */
    'Admin' => [
        'view all tickets',
        'modify users'
    ]
];