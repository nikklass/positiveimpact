<?php

return [

    'role_structure' => [
        
        'superadministrator' => [
            
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',

            'sms' => 'c,r,u,d',
            'scheduled_sms' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'companies' => 'c,r,u,d',
            'paybill' => 'c,r,u,d'

        ],  

        'administrator' => [
            
            'users' => 'c,r,u,d',
            'profile' => 'r,u',

            'sms' => 'c,r,u,d',
            'scheduled_sms' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'companies' => 'c,r,u,d',
            'paybill' => 'r'

        ],

        'companyadministrator' => [
            
            'users' => 'c,r,u,d',
            'profile' => 'r,u',

            'sms' => 'c,r,u,d',
            'scheduled_sms' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'paybill' => 'r'

        ],

        'manager' => [

            'profile' => 'r,u',
            'paybill' => 'r'

        ],

        'supervisor' => [

            'profile' => 'r,u'

        ]

    ],

    'permission_structure' => [
        
        /*'cru_user' => [
            'profile' => 'c,r,u'
        ],*/

    ],

    'permissions_map' => [

        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'

    ]

];
