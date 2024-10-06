<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('website.home');
});
Route::get('/emails', function () {
    return view('emails.registration');
});
Route::get('login', [\App\Http\Controllers\UserConfig\UserInfoController::class, 'loginPage'])->name('login');
Route::get('registration', [\App\Http\Controllers\UserConfig\UserInfoController::class, 'registration'])->name('registration');
Route::post('loginPost', [\App\Http\Controllers\UserConfig\UserInfoController::class, 'loginPost'])->name('loginPost');
Route::post('regPost', [\App\Http\Controllers\merchant\MerchantInfoController::class, 'regPost'])->name('regPost');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('menu-info', \App\Http\Controllers\UserConfig\SidebarController::class);
    Route::post('/menu-info/data', [\App\Http\Controllers\UserConfig\SidebarController::class, 'getData'])->name('menu-info.data');
    Route::get('/menus-by-role', [\App\Http\Controllers\UserConfig\SidebarController::class, 'getMenusByRole'])->middleware('auth');
    Route::get('getPrentMenu', [\App\Http\Controllers\UserConfig\SidebarController::class, 'getPrentMenu']);

    Route::post('/logout', [\App\Http\Controllers\UserConfig\UserInfoController::class, 'logout'])->name('logout');

    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

    Route::resource('UserInfo', \App\Http\Controllers\UserConfig\UserInfoController::class);
    Route::post('/users/data', [\App\Http\Controllers\UserConfig\UserInfoController::class, 'getUserData'])->name('users.data');

    Route::resource('roles', \App\Http\Controllers\UserConfig\RoleController::class);
    Route::get('/permission', [\App\Http\Controllers\UserConfig\RoleController::class, 'indexs']);
    Route::get('getRolesList', [\App\Http\Controllers\UserConfig\RoleController::class, 'getRolesList']);
    Route::get('getRolesMenuList/{roleId}', [\App\Http\Controllers\UserConfig\RoleController::class, 'getMenuList']);
    Route::post('submitPermissions', [\App\Http\Controllers\UserConfig\RoleController::class, 'submitPermissions']);
    Route::post('/roles/data', [\App\Http\Controllers\UserConfig\RoleController::class, 'getData'])->name('roles.data');

    Route::resource('merchant-info', \App\Http\Controllers\merchant\MerchantInfoController::class);
    Route::get('getDisUserList', [\App\Http\Controllers\UserConfig\UserInfoController::class, 'getDisUserList']);
    Route::post('/merchant-info/data', [\App\Http\Controllers\merchant\MerchantInfoController::class, 'getData'])->name('merchant-info.data');

    Route::resource('DivisionInfo', \App\Http\Controllers\LocConfig\DivisionInfoController::class);
    Route::post('/DivisionInfo/data', [\App\Http\Controllers\LocConfig\DivisionInfoController::class, 'getData'])->name('DivisionInfo.data');

    Route::resource('DistrictInfo', \App\Http\Controllers\LocConfig\DistrictInfoController::class);
    Route::get('GetDivisionInfo', [\App\Http\Controllers\LocConfig\DistrictInfoController::class, 'GetDivisionInfo']);
    Route::post('/DistrictInfo/data', [\App\Http\Controllers\LocConfig\DistrictInfoController::class, 'getData'])->name('DistrictInfo.data');

    Route::resource('ThanaInfo', \App\Http\Controllers\LocConfig\ThanaInfoController::class);
    Route::get('GetDistrict', [\App\Http\Controllers\LocConfig\ThanaInfoController::class, 'GetDistrict']);
    Route::post('/ThanaInfo/data', [\App\Http\Controllers\LocConfig\ThanaInfoController::class, 'getData'])->name('ThanaInfo.data');

    Route::resource('AreaInfo', \App\Http\Controllers\LocConfig\AreaInfoController::class);
    Route::get('GetThana', [\App\Http\Controllers\LocConfig\AreaInfoController::class, 'GetThana']);
    Route::post('/AreaInfo/data', [\App\Http\Controllers\LocConfig\AreaInfoController::class, 'getData'])->name('AreaInfo.data');

    Route::resource('OutletInfo', \App\Http\Controllers\LocConfig\OutletInfoController::class);
    Route::get('GetArea', [\App\Http\Controllers\LocConfig\OutletInfoController::class, 'GetArea']);
    Route::post('/OutletInfo/data', [\App\Http\Controllers\LocConfig\OutletInfoController::class, 'getData'])->name('OutletInfo.data');

    Route::resource('store', \App\Http\Controllers\store\StoreController::class);
    Route::get('getStore', [\App\Http\Controllers\store\StoreController::class, 'GetArea']);
    Route::post('/storeInfo/data', [\App\Http\Controllers\store\StoreController::class, 'getData'])->name('storeInfo.data');

    Route::resource('invoices', \App\Http\Controllers\store\InvoicesController::class);
    Route::post('/invoicesInfo/data', [\App\Http\Controllers\store\InvoicesController::class, 'getData'])->name('invoicesInfo.data');

    Route::resource('WebSettings', \App\Http\Controllers\Settings\WebSettingsController::class);

    Route::resource('MenuPermission', \App\Http\Controllers\Menu\MenuPermissionController::class);


});
