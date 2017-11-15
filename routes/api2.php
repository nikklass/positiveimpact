<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){

    $api->group(['middleware' => ['throttle:60,1', 'bindings'], 'namespace' => 'App\Http\Controllers'], function($api) {

        $api->get('ping', 'Api\PingController@index');

        //login and refresh token
        $api->post('/login', 'Api\Users\ApiLoginController@login');

        //ussd routes - no need to login
        $api->group(['prefix' => 'ussd-registration'],function ($api) {
            
            $api->post('/', 'Api\Ussd\ApiUssdRegistrationController@store');

        });

        //create user
        $api->group(['prefix' => 'users'], function ($api) {
            $api->post('/', 'Api\Users\ApiUsersController@store');
            $api->post('/confirm', 'Api\Users\ApiUsersController@accountconfirm');
        });

        $api->group(['middleware' => ['auth:api'], ], function ($api) {
        
            //auth - ussd routes
            $api->group(['prefix' => 'ussd-registration'],function ($api) {
            
                $api->get('/', 'Api\Ussd\ApiUssdRegistrationController@index');
                $api->get('/{id}', 'Api\Ussd\ApiUssdRegistrationController@show');
                $api->put('/{id}', 'Api\Ussd\ApiUssdRegistrationController@update');
                $api->patch('/{id}', 'Api\Ussd\ApiUssdRegistrationController@update');
                //$api->delete('/{id}', 'Api\Ussd\ApiUssdRegistrationController@destroy');

            });

            //sms routes
            $api->group(['prefix' => 'sms'],function ($api) {
                
                $api->get('/getaccounts', 'Api\Sms\SmsAccountController@getBulkSmsAccounts');
                $api->get('/getaccount', 'Api\Sms\SmsAccountController@getBulkSmsAccount');
                $api->get('/getinbox', 'Api\Sms\SmsAccountController@smsInbox');
                $api->get('/sendsms', 'Api\Sms\SmsAccountController@sendBulkSms');
                $api->post('/sendsms', 'Api\Sms\SmsAccountController@sendBulkSms');

            });

            //mpesa routes
            $api->group(['prefix' => 'mpesa'],function ($api) {
                
                $api->get('/getpayments', 'Api\Mpesa\MpesaIncomingController@getPayments');

                $api->post('/checkout', 'Api\Mpesa\MpesaOutgoingController@checkout');

            });

            $api->group(['prefix' => 'users'], function ($api) {
                $api->get('/', 'Api\Users\UsersController@index');
                $api->post('/', 'Api\Users\UsersController@store');
                $api->get('/{uuid}', 'Api\Users\UsersController@show');
                $api->put('/{uuid}', 'Api\Users\UsersController@update');
                $api->patch('/{uuid}', 'Api\Users\UsersController@update');
                $api->delete('/{uuid}', 'Api\Users\UsersController@destroy');
            });

            $api->group(['prefix' => 'roles'], function ($api) {
                $api->get('/', 'Api\Users\RolesController@index');
                $api->post('/', 'Api\Users\RolesController@store');
                $api->get('/{uuid}', 'Api\Users\RolesController@show');
                $api->put('/{uuid}', 'Api\Users\RolesController@update');
                $api->patch('/{uuid}', 'Api\Users\RolesController@update');
                $api->delete('/{uuid}', 'Api\Users\RolesController@destroy');
            });

            $api->get('permissions', 'Api\Users\PermissionsController@index');

            $api->group(['prefix' => 'me'], function($api) {
                $api->get('/', 'Api\Users\ProfileController@index');
                $api->put('/', 'Api\Users\ProfileController@update');
                $api->patch('/', 'Api\Users\ProfileController@update');
                $api->put('/password', 'Api\Users\ProfileController@updatePassword');
            });

        });

    });

});



