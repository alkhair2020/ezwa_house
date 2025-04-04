<?php

use Illuminate\Support\Facades\Route;

####  admin #######################
// Auth::routes();
use App\Helpers\DateHelper;
 Route::get('admin-login', 'Auth\LoginController@LoginAdmin')->name('admin-login');



 Route::resource('admin/visas','Admin\VisaController');
 Route::resource('admin/tickets','Admin\TicketController');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin','prefix' => 'admin'], function () {     
    
    Route::get('/cleint-import', function () {
        return view('admin.cleint_import');
    });

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('prices','PriceController');
    Route::resource('properties','PropertyController');
    Route::get('rooms', 'PropertyController@rooms');
    Route::post('store-room', 'PropertyController@storeRoom')->name('store-room');
    
    Route::resource('clients','ClientController'); 
    Route::get('property/clients/{id}', 'ClientController@propertyClients');
    Route::get('clients/print/{id}', 'ClientController@print')->name('clients.print');
    Route::get('clients/receipt/form/{id}', 'ClientController@ReceiptForm')->name('clients.print.form');
    
    Route::get('client/closed', 'ClientController@clientClosed');
    Route::post('client/renew', 'ClientController@clientRenew')->name('client.renew');

    Route::resource('losses','LostController'); 
    Route::get('losses/print/{id}', 'LostController@print')->name('losses.print');

    Route::resource('maintenances','MaintenanceController'); 
    Route::get('maintenances/print/{id}', 'MaintenanceController@print')->name('maintenances.print');

    Route::resource('cleans','CleanController'); 
    Route::get('cleans/print/{id}', 'CleanController@print')->name('cleans.print');
   

   Route::resource('receipts','ReceiptController'); 
   Route::get('clients/receipts/{id}', 'ReceiptController@clientReceipts');
   Route::get('receipts/print/{id}', 'ReceiptController@print');

    Route::resource('expenses','ExpenseController');
    Route::get('clients/expenses/{id}', 'ExpenseController@clientExpenses');
    Route::get('expenses/print/{id}', 'ExpenseController@print')->name('expenses.print');

    Route::resource('reports','ReportController');
    Route::get('report/print', 'ReportController@index')->name('report.print');
    // Route::get('report-search', 'ReportController@print')->name('report.search');


    Route::get('/convert-date', function () {
        $gregorianDate = '2024-05-31'; // يمكنك أيضاً استلام هذا التاريخ كمدخل من المستخدم
        list($year, $month, $day) = explode('-', $gregorianDate);
    
        $hijriDate = DateHelper::gregorianToHijri($year, $month, $day);
    
        return "التاريخ الميلادي: $gregorianDate يوافق التاريخ الهجري: {$hijriDate['year']}-{$hijriDate['month']}-{$hijriDate['day']}";
    });

   Route::resource('products','ProductController');
   Route::resource('dashboard','DashBoardController');
   Route::resource('countries','CountryController');
   Route::resource('cities','CityController');
   Route::resource('states','StateController');
   
   
    Route::get('/attendances', function () {
        return view('admin.attendances.index');
    });
    Route::get('/salaries', function () {
        return view('admin.salaries.index');
    });

    Route::get('/leaves', function () {
        return view('admin.leaves.index');
    });
    Route::get('/user-permission', function () {
        return view('admin.permission.index');
    });
    Route::get('/user-contracts', function () {
        return view('admin.userContracts.index');
    });
    
    Route::get('/employees', function () {
        return view('admin.users.index');
        // return view('livewire.admin.employees.print');
    });
   

   Route::get('settings','SettingController@settings');
   Route::post('settings/update','SettingController@updateSettings');

    // Route::get('about', 'ProfileController@about'); 
    // Route::get('contact', 'ProfileController@contact');
    Route::get('contact', 'ProfileController@contact');
    Route::post('settings/contactdata','ProfileController@updateContactData');
    Route::get('profile', 'SettingController@index');
    Route::post('profile/update','SettingController@updateProfile');
    Route::post('user/changepassword', 'SettingController@changePassword')->name('user.changepassword');
    //      Route::post('user/changepassword', 'ProfileController@instructorChangePassword')->name('instructor.changepassword');    
   
}); 