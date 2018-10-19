<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/  


Route::get('', 'UserController@home')->name('home');

route::get('/2fa/enable', 'Google2FAController@enableTwoFactor');
Route::post('/2fa/save', 'Google2FAController@saveSecretKey');
Route::post('/2fa/disable', 'Google2FAController@disableTwoFactor');
Route::get('/2fa/validate', 'Auth\AuthController@getValidateToken');
Route::post('/2fa/validate', ['middleware' => 'throttle:5', 'uses' => 'Auth\AuthController@postValidateToken']);
Route::post('/2fa/validate-disabletime', ['uses' => 'Auth\AuthController@postValidateTokenDesable']);
Route::post('2fa/validate-enabletime', ['uses' => 'Auth\AuthController@postValidateTokenenable']);
Route::post('2fa/validate-enabletimeuser', ['uses' => 'Auth\AuthController@postValidateTokenenableuser']);
Route::post('/2fa/validateuser', ['uses' => 'Auth\AuthController@postValidateTokenuser']);


Route::get('login', 'LoginController@login');
Route::post('login-post', 'LoginController@loginPost');

Route::get('register', 'RegisterController@register');
Route::post('register', 'RegisterController@registerPost');

Route::get('/activate/{email}/{activationCode}', 'RegisterController@activate');


Route::get('ref/{refid}', 'RegisterController@referral');


/*-----------Forgot Password Full Procedure -----------------  */
Route::get('forgot-password', 'ForgotPasswordController@index');
Route::post('forgot-password-post', 'ForgotPasswordController@store');
Route::get('/reset/{email}/{resetcode}', 'ForgotPasswordController@show');
Route::post('forgotPassword_update/{id}', 'ForgotPasswordController@update');

Route::get('logout', 'LoginController@logout');
Route::get('subscribe', 'RegisterController@subscribe');
Route::post('email-subscribe', 'SubscriptionsController@addSubscribe');

Route::group(
    ['middleware' => 'user'], function () {
            
    //user wallet deposit

    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

    Route::get('deposit/{coin}', 'DepositController@index');
    /********* ipn handler  ***********/
    Route::get('ipn-handler', 'PaymentController@IpnHandler');
    Route::post('ipn-handler', 'PaymentController@IpnHandler');
    Route::get('wallet', 'WalletController@wallet')->name('wallet');

    Route::get('withdraw/{coin}', 'WithdrawController@index'); // withdraw balance
    Route::post('withdraw', 'WithdrawController@postWithdraw');

    Route::get('buy-token', ['as' => 'buy-token', 'uses' => 'ICOcontroller@buytoken']);
    Route::post('storeico', 'ICOcontroller@storeico');
    Route::get('ico-info', ['as' => 'ico-info', 'uses' => 'ICOcontroller@icoInfo']);

    Route::get('user-referral','ReferralController@index');


    Route::group(['prefix' => 'all'], function () {
//    Route::get('withdraw', '@index');

    Route::get('deposit','TransactionController@depositTransaction');
    Route::get('withdrawal','TransactionController@withdrawalTransaction');
    Route::get('tokens','TransactionController@buyTokenTransaction');
    });



});

/*********************** admin *********************/
Route::group(
    ['middleware' => 'admin'], function () {

    //user wallet deposit
    Route::group(['prefix' => 'admin'], function () {

        Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

        // Withdraw controller
        Route::get('withdrawal', 'WithdrawController@getAllWithdraw');
        Route::get('withdraw/{status}/{id}', 'WithdrawController@withdrawalStatusUpdate');
        Route::get('deposit', 'DepositController@getAllDeposit');
        Route::get('tokens', 'WalletController@getAllTokenh');
        Route::get('user', 'AdminController@user_index');
        Route::get('user/{id}', 'AdminController@deleteUser');
        Route::get('phases', 'SettingController@phases');

        Route::get('subscribers-list', 'SubscriptionsController@subscribers_list');
        Route::get('subcriber-delete/{id}', 'SubscriptionsController@delete');
    });

    Route::post('confirmStatus', 'WithdrawController@confirmStatus');
    Route::post('rejectStatus', 'WithdrawController@rejectStatus');
        //User Status Active, Block & Delete
   
    Route::get('user-status/{status}/{id}', 'AdminController@user_status');
        //ICO setting & Phase Setting
    Route::get('admin/settings', 'SettingController@ico_edit');
    Route::post('admin-updateSetting', 'SettingController@updateSetting');
   
    Route::post('addtokens/{id}', 'SettingController@add_Sold_Tokens');
    Route::get('phase-delete/{id}', 'SettingController@phase_delete');
    Route::get('phaseStatus/{status}/{id}', 'SettingController@phaseStatus');
    Route::get('phase-edit/{id}', 'SettingController@phase_edit_index');
    Route::post('admin-update-phase', 'SettingController@phase_update');
    Route::get('phase-add', 'SettingController@phase_add_index');
    Route::post('add-phase', 'SettingController@phase_add');

});

Route::group(
    ['middleware' => 'allauth'], function () {

    Route::get('profile', 'ProfileController@index');
    Route::post('profilepic/{id}', 'ProfileController@updatepic');
    Route::post('profile/{id}', 'ProfileController@update');
    Route::post('changePassword/{id}', 'ProfileController@updatePassword');

});




Route::get('admin-ratesettings', 'SettingController@ratesetting'); //call api for btc and eth Price



