<?php

/*if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}*/
//Route::get('/api', 'ApiDocsController@index'); 

View::share('passport_client_id', \Config::get('constants.passport.client_id'));
View::share('passport_client_secret', \Config::get('constants.passport.client_secret'));
View::share('passport_login_url', \Config::get('constants.passport.login_url'));
View::share('passport_user_url', \Config::get('constants.passport.user_url'));  


View::share('get_users_url', \Config::get('constants.routes.get_users_url'));
View::share('send_message_url', \Config::get('constants.routes.send_message_url'));
View::share('create_user_url', \Config::get('constants.routes.create_user_url'));
View::share('create_message_url', \Config::get('constants.routes.create_message_url'));
View::share('fetch_savings_deposit_accounts_url', \Config::get('constants.routes.fetch_savings_deposit_accounts_url'));


Route::group(['middleware' => 'auth'], function() {

	//Route::get('/', 'HomeController@index')->name('home');

	Route::post('logout', 'Auth\LoginController@logout')->name('logout'); 

	
	//export to excel data...
	Route::get('excel/export-smsoutbox/{type}', 'ExcelController@exportOutboxSmsToExcel')->name('excel.export-smsoutbox');
	Route::get('excel/export-groups/{type}', 'ExcelController@exportGroupsToExcel')->name('excel.export-groups');
	Route::get('excel/mpesa-incoming/{type}', 'ExcelController@exportMpesaIncomingToExcel')->name('excel.mpesa-incoming');
	Route::get('excel/yehu-deposits/{type}', 'ExcelController@exportYehuDepositsToExcel')->name('excel.yehu-deposits');
	Route::get('excel/ussd-registration/{type}', 'ExcelController@exportUssdRegistrationToExcel')->name('excel.ussd-registration');
	Route::get('excel/ussd-events/{type}', 'ExcelController@exportUssdEventsToExcel')->name('excel.ussd-events');
	Route::get('excel/ussd-payments/{type}', 'ExcelController@exportUssdPaymentsToExcel')->name('excel.ussd-payments');
	Route::get('excel/ussd-recommends/{type}', 'ExcelController@exportUssdRecommendsToExcel')->name('excel.ussd-recommends');
	Route::get('excel/ussd-contactus/{type}', 'ExcelController@exportUssdContactUsToExcel')->name('excel.ussd-contactus');
	Route::get('excel/loan-applications/{type}', 'ExcelController@exportLoanApplicationsToExcel')->name('excel.loan-applications');
	Route::get('excel/loans/{type}', 'ExcelController@exportLoanApplicationsToExcel')->name('excel.loans');
	Route::get('excel/user-savings-accounts/{type}', 'ExcelController@exportUserSavingsAccountsToExcel')->name('excel.user-savings-accounts');
	Route::get('excel/user-loan-repayment-accounts/{type}', 'ExcelController@exportUserLoanRepaymentAccountsToExcel')->name('excel.user-loan-repayment-accounts');
	Route::get('excel/savings-deposit-accounts/{type}', 'ExcelController@exportDepositSavingsAccountsToExcel')->name('excel.savings-deposit-accounts');
	Route::get('excel/loan-repayment-deposit-accounts/{type}', 'ExcelController@exportDepositLoanRepaymentAccountsToExcel')->name('excel.loan-repayment-deposit-accounts');
	Route::get('excel/company-join-requests/{type}', 'ExcelController@exportDepositLoanRepaymentAccountsToExcel')->name('excel.company-join-requests');

	//handle bulk import user...
	Route::get('users/create-bulk', 'UserImportController@create')->name('bulk-users.create');
	Route::post('users/create-bulk', 'UserImportController@store')->name('bulk-users.store');
	Route::get('users/create-bulk/get-data/{uuid}', 'UserImportController@getImportData')->name('bulk-users.getimportdata');
	Route::get('users/create-bulk/get-incomplete/{uuid}', 'UserImportController@getIncompleteData')->name('bulk-users.getincompletedata');
	
	//send email routes...
	Route::get('/email/newUser', 'EmailController@newUserEmail')->name('email.newuser');

	//user routes...
	Route::resource('/users', 'UserController');

	//manage products routes...
	Route::resource('/manage/products', 'Web\Products\ProductController');

	//manage events routes...
	Route::resource('/manage/events', 'Web\Events\EventController');

	//manage glaccounts routes...
	Route::resource('/manage/glaccounts', 'Web\Glaccounts\GlaccountController');

	//loans routes...
	Route::resource('/loans', 'Web\Loans\LoanController');

	//companyjoinrequests routes...
	Route::resource('/company-join-requests', 'Web\Company\CompanyJoinRequestController');
	Route::get('/company-join-requests/{id}/process', 'Web\Company\CompanyJoinRequestController@showProcessJoinRequest')->name('company-join-requests.createprocess');
	Route::post('/company-join-requests/process', 'Web\Company\CompanyJoinRequestController@processJoinRequest')->name('company-join-requests.process');

	//loan applications routes...
	Route::resource('/loan-applications', 'Web\Loans\LoanApplicationController');
	Route::post('/loan-applications/create-step-2', 'Web\Loans\LoanApplicationController@create_step2')->name('loan-applications.create_step2');
	Route::get('/loan-applications/{id}/approve', 'Web\Loans\LoanApplicationController@create_approve')->name('loan-applications.approve');
	Route::put('/loan-applications/{id}/update-approve', 'Web\Loans\LoanApplicationController@update_approve')->name('loan-applications.update_approve');
	

	//user savings accounts routes... 
	Route::resource('/user-savings-accounts', 'Web\Account\UserSavingsAccountController');

	//user Loan Repayment accounts routes... 
	Route::resource('/user-loan-repayments-accounts', 'Web\Account\UserLoanRepaymentsAccountController');

	//savings deposit accounts routes...
	Route::resource('/savings-deposit-accounts', 'Web\Account\SavingsDepositAccountController');

	//loan repayments deposit accounts routes...
	Route::resource('/loan-repayments-deposit-accounts', 'Web\Account\LoanRepaymentsDepositAccountController');

	//user profile routes...
	Route::get('/profile/{id}', 'ProfileController@indexId')->name('user.profile.id');
	Route::get('/profile', 'ProfileController@index')->name('user.profile'); 

	//image upload / resize routes
	Route::get('/resizeImage', 'Web\Images\ImageController@resizeImage')->name('images.index');
	Route::post('/resizeImagePost', 'Web\Images\ImageController@resizeImagePost')->name('images.store'); 

	//role routes...
	Route::resource('/roles', 'RoleController', ['except' => 'destroy']);

	//group routes...
	Route::resource('/groups', 'GroupController');

    //mpesa-incoming routes...
    Route::resource('/mpesa-incoming', 'MpesaIncomingController');

    //yehu-deposits routes...
	Route::get('/yehu-deposits', 
			'Web\YehuMpesaDeposit\YehuMpesaDepositController@index')->name('yehu-deposits.index'); 
	Route::get('/yehu-deposits/{id}', 
			'Web\YehuMpesaDeposit\YehuMpesaDepositController@show')->name('yehu-deposits.show'); 
	Route::get('/yehu-deposits/{id}/edit', 
			'Web\YehuMpesaDeposit\YehuMpesaDepositController@edit')->name('yehu-deposits.edit');
	Route::put('/yehu-deposits/{id}/update', 
			'Web\YehuMpesaDeposit\YehuMpesaDepositController@update')->name('yehu-deposits.update');
	Route::get('/yehu-deposits/{id}/repost', 
			'Web\YehuMpesaDeposit\YehuMpesaDepositController@repost')->name('yehu-deposits.repost');

    //ussd-registration routes...
    Route::resource('/ussd-registration', 'Web\Ussd\UssdRegistrationController', ['except' => 'destroy']);

    //ussd-events routes...
    Route::resource('/ussd-events', 'Web\Ussd\UssdEventController', ['except' => 'destroy']);

    //ussd-payments routes...
    Route::resource('/ussd-payments', 'Web\Ussd\UssdPaymentController', ['except' => ['edit', 'update', 'destroy']]);

    //ussd-recommends routes...
    Route::resource('/ussd-recommends', 'Web\Ussd\UssdRecommendController', ['except' => ['edit', 'update', 'destroy']]);

    //ussd-contactus routes...
    Route::resource('/ussd-contactus', 'Web\Ussd\UssdContactUsController', ['except' => ['edit', 'update', 'destroy']]);

	//smsoutbox routes...
	Route::resource('/smsoutbox', 'SmsOutboxController', ['except' => ['edit', 'destroy']]);

	//schedule smsoutbox routes...
	Route::resource('/scheduled-smsoutbox', 'ScheduleSmsOutboxController');

});

//superadmin routes 
Route::group(['middleware' => 'role:superadministrator'], function() {
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

	//guest - no login required here
	Route::get('/', 'Web\HomeController@index')->name('site.home');
	Route::get('/about', 'Web\HomeController@about')->name('site.about');
	Route::get('/programs', 'Web\HomeController@programs')->name('site.programs');
	Route::get('/videos', 'Web\HomeController@videos')->name('site.videos');
	Route::get('/blog', 'Web\HomeController@blog')->name('site.blog');

	Route::get('/donate', 'Web\HomeController@donate')->name('site.donate');

	Route::get('/contacts', 'Web\CommentController@create')->name('site.contacts');
	Route::post('/contacts', 'Web\CommentController@store')->name('site.contacts.store');
	//Route::resource('/contacts', 'Web\HomeController@contacts');
	

	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login')->name('login.store');

	Route::get('confirm', 'Auth\LoginController@showConfirmForm')->name('confirm');
	Route::post('confirm', 'Auth\LoginController@confirm')->name('confirm.store');

	Route::get('resend-code', 'Auth\LoginController@showResendCodeForm')->name('resend_code');
	Route::post('resend-code', 'Auth\LoginController@resendCode')->name('resend_code.store');

	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register')->name('register.store');

	// Password Reset Routes...
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.store');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

});
