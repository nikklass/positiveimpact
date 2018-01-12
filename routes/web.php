<?php

//Route::get('/api', 'ApiDocsController@index');

Route::get('/', 'Web\HomeController@index')->name('site.home');
Route::get('/about', 'Web\HomeController@about')->name('site.about');
Route::get('/programs', 'Web\HomeController@programs')->name('site.programs');
Route::get('/videos', 'Web\HomeController@videos')->name('site.videos');
Route::get('/blog', 'Web\HomeController@blog')->name('site.blog');

Route::get('/donate', 'Web\HomeController@donate')->name('site.donate');

Route::get('/contacts', 'Web\CommentController@create')->name('site.contacts');
Route::post('/contacts', 'Web\CommentController@store')->name('site.contacts.store');
//Route::resource('/contacts', 'Web\HomeController@contacts');

//clubs routes...
Route::resource('/clubs', 'Web\Clubs\ClubsController');

//offers routes...
Route::resource('/offers', 'Web\Offers\OffersController');


//all logged in users routes
Route::group(['middleware' => 'auth'], function() {

	

	//repayments routes...
	Route::resource('/repayments', 'RepaymentController');

	//loans routes...
	Route::resource('/loans', 'LoanController');

	//images routes...
	Route::resource('/images', 'ImageController');

	//logout route...
	Route::post('logout', 'Auth\LoginController@logout')->name('logout'); 

});

/*Route::group(['middleware' => 'auth'], function() {

	Route::post('logout', 'Auth\LoginController@logout')->name('logout'); */
	
	//export to excel data...
	/*Route::get('excel/export-smsoutbox/{type}', 'ExcelController@exportOutboxSmsToExcel')->name('excel.export-smsoutbox');
	Route::get('excel/export-groups/{type}', 'ExcelController@exportGroupsToExcel')->name('excel.export-groups');
	Route::get('excel/mpesa-incoming/{type}', 'ExcelController@exportMpesaIncomingToExcel')->name('excel.mpesa-incoming');*/

	

	//handle bulk import user...
	/*Route::get('users/create-bulk', 'UserImportController@create')->name('bulk-users.create');
	Route::post('users/create-bulk', 'UserImportController@store')->name('bulk-users.store');
	Route::get('users/create-bulk/get-data/{uuid}', 'UserImportController@getImportData')->name('bulk-users.getimportdata');
	Route::get('users/create-bulk/get-incomplete/{uuid}', 'UserImportController@getIncompleteData')->name('bulk-users.getincompletedata');
	
	//send email routes...
	Route::get('/email/newUser', 'EmailController@newUserEmail')->name('email.newuser');

	//user routes...
	Route::resource('/users', 'UserController');

	//user profile routes...
	Route::get('/profile/{id}', 'ProfileController@indexId')->name('user.profile.id');
	Route::get('/profile', 'ProfileController@index')->name('user.profile'); 

	//role routes...
	Route::resource('/roles', 'RoleController', ['except' => 'destroy']);

	//group routes...
	Route::resource('/groups', 'GroupController');

	//mpesa-incoming routes...
	Route::resource('/mpesa-incoming', 'MpesaIncomingController');	

	//smsoutbox routes...
	Route::resource('/smsoutbox', 'SmsOutboxController', ['except' => ['edit', 'destroy']]);

	//schedule smsoutbox routes...
	Route::resource('/scheduled-smsoutbox', 'ScheduleSmsOutboxController');*/

//});

//superadmin routes
/*Route::group(['middleware' => 'role:superadministrator'], function() {
	//permission routes...
	Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);

	//mpesa paybills routes
	Route::resource('/mpesa-paybills', 'MpesaPaybillController');
});

//superadmin and admin routes
Route::group(['middleware' => 'role:superadministrator|administrator'], function() {
	//companies routes...
	Route::resource('/companies', 'CompanyController');
});

Route::group(['middleware' => 'guest'], function() {

	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login')->name('login.store');

	// Password Reset Routes...
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.store');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

});*/


