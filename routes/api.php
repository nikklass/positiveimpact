<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){

    $api->group(['middleware' => ['throttle:60,1', 'bindings'], 'namespace' => 'App\Http\Controllers'], function($api) {

        $api->get('ping', 'Api\PingController@index');

        //login and refresh token
        $api->post('/login', 'Api\Users\ApiLoginController@login');

        //sms routes
        $api->group(['prefix' => 'sms'],function ($api) {
            $api->get('/registration', 'Api\Sms\ApiSmsOutboxController@store');
            $api->post('/registration', 'Api\Sms\ApiSmsOutboxController@store');
        });

        //countries
        $api->group(['prefix' => 'countries'], function ($api) {
            $api->get('/', 'Api\Countries\ApiCountriesController@index');
            $api->get('/{id}', 'Api\Countries\ApiCountriesController@show');
        });

        //states
        $api->group(['prefix' => 'states'], function ($api) {
            $api->get('/', 'Api\States\StatesController@index');
            $api->get('/{id}', 'Api\States\StatesController@show');
        });

        //cities
        $api->group(['prefix' => 'cities'], function ($api) {
            $api->get('/', 'Api\Cities\CitiesController@index');
            $api->get('/{id}', 'Api\Cities\CitiesController@show');
        });

        //constituencies
        $api->group(['prefix' => 'constituencies'], function ($api) {
            $api->get('/', 'Api\Constituencies\ConstituenciesController@index');
            $api->get('/{id}', 'Api\Constituencies\ConstituenciesController@show');
        });

        //wards
        $api->group(['prefix' => 'wards'], function ($api) {
            $api->get('/', 'Api\Wards\WardsController@index');
            $api->get('/{id}', 'Api\Wards\WardsController@show');
        });

        //oauth clients
        $api->group(['prefix' => 'oauthclients'], function ($api) {
            $api->get('/', 'Api\Users\OauthClientsController@index');
            $api->get('/{id}', 'Api\Users\OauthClientsController@show');
        });

        //create user
        $api->group(['prefix' => 'users'], function ($api) {
            $api->post('/', 'Api\Users\ApiUsersController@store');
            $api->post('/confirm', 'Api\Users\ApiUsersController@accountconfirm');
        });
        

        $api->group(['middleware' => ['auth:api'], ], function ($api) {

            //users
            $api->group(['prefix' => 'users'], function ($api) {
                $api->get('/', 'Api\Users\ApiUsersController@index');
                $api->get('/search', 'Api\Users\ApiUsersController@search');
                $api->get('/{uuid}', 'Api\Users\ApiUsersController@show');
                $api->put('/{uuid}', 'Api\Users\ApiUsersController@update');
                $api->patch('/{uuid}', 'Api\Users\ApiUsersController@update');
                $api->delete('/{uuid}', 'Api\Users\ApiUsersController@destroy');

                /*change user password*/
                $api->post('/changePassword/{uuid}', 'Api\Users\ApiUsersController@changePassword');

                /*update dob*/
                $api->put('/dob/{uuid}', 'Api\Users\ApiUsersController@updateDob');
                $api->patch('/dob/{uuid}', 'Api\Users\ApiUsersController@updateDob');

                /*update dob*/
                $api->put('/location/{uuid}', 'Api\Users\ApiUsersController@updateLocation');
                $api->patch('/location/{uuid}', 'Api\Users\ApiUsersController@updateLocation');

            });

            //user
            $api->group(['prefix' => 'user'], function ($api) {
                $api->get('/', 'Api\Users\ApiUsersController@loggeduser');
            });

            //tokens
            $api->post('/login/refresh', 'Api\Users\ApiLoginController@refresh');
            $api->post('/login/validateToken', 'Api\Users\ApiLoginController@validateToken');
            

            //sms routes
            $api->group(['prefix' => 'sms'],function ($api) {
                $api->get('/getaccount', 'Api\Sms\ApiSmsOutboxController@getBulkSmsAccount');
                $api->get('/getinbox', 'Api\Sms\ApiSmsOutboxController@smsInbox');
                $api->get('/sendsms', 'Api\Sms\ApiSmsOutboxController@sendBulkSms');
                $api->post('/sendsms', 'Api\Sms\ApiSmsOutboxController@sendBulkSms');
            });

            //messages routes
            $api->group(['prefix' => 'messages'],function ($api) {
                $api->get('/', 'Api\Messages\ApiMessagesController@index');
                $api->post('/', 'Api\Messages\ApiMessagesController@store');
                $api->get('/{id}', 'Api\Messages\ApiMessagesController@show');
                $api->put('/{id}', 'Api\Messages\ApiMessagesController@update');
                $api->patch('/{id}', 'Api\Messages\ApiMessagesController@update');
                $api->delete('/{id}', 'Api\Messages\ApiMessagesController@destroy');
            });

            //countries
            $api->group(['prefix' => 'countries'], function ($api) {
                $api->post('/', 'Api\Countries\ApiCountriesController@store');
                $api->put('/{id}', 'Api\Countries\ApiCountriesController@update');
                $api->delete('/{id}', 'Api\Countries\ApiCountriesController@destroy');
            });

            //states
            $api->group(['prefix' => 'states'], function ($api) {
                $api->post('/', 'Api\States\ApiStatesController@store');
                $api->put('/{id}', 'Api\States\ApiStatesController@update');
                $api->delete('/{id}', 'Api\States\ApiStatesController@destroy');
            });

            //chatchannels routes
            $api->group(['prefix' => 'chatchannels'],function ($api) {
                $api->get('/', 'Api\ChatChannels\ApiChatChannelsController@index');
                $api->post('/', 'Api\ChatChannels\ApiChatChannelsController@store');
                $api->get('/{id}', 'Api\ChatChannels\ApiChatChannelsController@show');
                $api->put('/{id}', 'Api\ChatChannels\ApiChatChannelsController@update');
                $api->patch('/{id}', 'Api\ChatChannels\ApiChatChannelsController@update');
                $api->delete('/{id}', 'Api\ChatChannels\ApiChatChannelsController@destroy');
            });

            //chatmessagereadstates routes
            $api->group(['prefix' => 'chatmessagereadstates'],function ($api) {
                $api->get('/', 'Api\ChatMessageReadStates\ApiChatMessageReadStatesController@index');
                $api->post('/', 'Api\ChatMessageReadStates\ApiChatMessageReadStatesController@store');
                $api->get('/{id}', 'Api\ChatMessageReadStates\ApiChatMessageReadStatesController@show');
                $api->put('/{id}', 'Api\ChatMessageReadStates\ApiChatMessageReadStatesController@update');
                $api->patch('/{id}', 'Api\ChatMessageReadStates\ApiChatMessageReadStatesController@update');
                $api->delete('/{id}', 'Api\ChatMessageReadStates\ApiChatMessageReadStatesController@destroy');
            });

            //chatmessages routes
            $api->group(['prefix' => 'chatmessages'],function ($api) {
                $api->get('/', 'Api\ChatMessages\ApiChatMessagesController@index');
                $api->post('/', 'Api\ChatMessages\ApiChatMessagesController@store');
                $api->get('/{id}', 'Api\ChatMessages\ApiChatMessagesController@show');
                $api->put('/{id}', 'Api\ChatMessages\ApiChatMessagesController@update');
                $api->patch('/{id}', 'Api\ChatMessages\ApiChatMessagesController@update');
                $api->delete('/{id}', 'Api\ChatMessages\ApiChatMessagesController@destroy');
            });

            //chatthreads routes
            $api->group(['prefix' => 'chatthreads'],function ($api) {
                $api->get('/', 'Api\ChatThreads\ApiChatThreadsController@index');
                $api->post('/', 'Api\ChatThreads\ApiChatThreadsController@store');
                $api->get('/{id}', 'Api\ChatThreads\ApiChatThreadsController@show');
                $api->put('/{id}', 'Api\ChatThreads\ApiChatThreadsController@update');
                $api->patch('/{id}', 'Api\ChatThreads\ApiChatThreadsController@update');
                $api->delete('/{id}', 'Api\ChatThreads\ApiChatThreadsController@destroy');
            });

            //cities
            $api->group(['prefix' => 'cities'], function ($api) {
                $api->post('/', 'Api\Cities\ApiCitiesController@store');
                $api->put('/{id}', 'Api\Cities\ApiCitiesController@update');
                $api->delete('/{id}', 'Api\Cities\ApiCitiesController@destroy');
            });

            $api->group(['prefix' => 'roles'], function ($api) {
                $api->get('/', 'Api\Users\ApiRolesController@index');
                $api->post('/', 'Api\Users\ApiRolesController@store');
                $api->get('/{uuid}', 'Api\Users\ApiRolesController@show');
                $api->put('/{uuid}', 'Api\Users\ApiRolesController@update');
                $api->patch('/{uuid}', 'Api\Users\ApiRolesController@update');
                $api->delete('/{uuid}', 'Api\Users\ApiRolesController@destroy');
            });

            $api->get('permissions', 'Api\Users\ApiPermissionsController@index');

            $api->group(['prefix' => 'me'], function($api) {
                $api->get('/', 'Api\Users\ApiProfileController@index');
                $api->put('/', 'Api\Users\ApiProfileController@update');
                $api->patch('/', 'Api\Users\ApiProfileController@update');
                $api->put('/password', 'Api\Users\ApiProfileController@updatePassword');
            });

            $api->group(['prefix' => 'assets'], function($api) {
                $api->post('/', 'Api\Assets\ApiUploadFileController@store');
            });

        });

    });

});



