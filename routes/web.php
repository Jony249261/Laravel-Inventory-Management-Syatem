<?php


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

//Route::group(['middleware' => 'verified'], function(){
    //Route::get('/inbox', function () {
    //echo"Inbox";
    //})->name('inbox');

    //Route::get('/calender', function () {
        //echo"calender";
    //})->name('calender');

    //Route::get('/typography', function () {
        //echo"typography";
  //  })->name('typography');
//});

Route::get('/home', 'HomeController@index')->name('home');

//Employee
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert-employe', 'EmployeeController@store')->name('insert-employee');
Route::get('/all-employee', 'EmployeeController@all')->name('all-employee');
Route::get('/employee-delete/{employee_id}', 'EmployeeController@Delete')->name('employee-delete');
Route::get('/employee-view/{employee_id}', 'EmployeeController@View')->name('employee-view');
Route::get('/employee-edit/{employee_id}', 'EmployeeController@Edit')->name('employee-edit');
Route::post('/update-employe/{employee_id}', 'EmployeeController@Update')->name('employee-update');

//Customer--------------------
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer', 'CustomerController@store')->name('insert-customer');
Route::get('/all-customer', 'CustomerController@all')->name('all-customer');
Route::get('/customer-delete/{customer_id}', 'CustomerController@Delete')->name('customer-delete');
Route::get('/customer-view/{customer_id}', 'CustomerController@View')->name('customer-view');
Route::get('/customer-edit/{customer_id}', 'CustomerController@Edit')->name('customer-edit');
Route::post('/update-customer/{customer_id}', 'CustomerController@Update')->name('customer-update');




//Supplier--------------------
Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');
Route::post('/insert-supplier', 'SupplierController@store')->name('insert-supplier');
Route::get('/all-supplier', 'SupplierController@all')->name('all-supplier');
Route::get('/supplier-delete/{supplier_id}', 'SupplierController@Delete')->name('supplier-delete');
Route::get('/supplier-view/{supplier_id}', 'SupplierController@View')->name('supplier-view');
Route::get('/supplier-edit/{supplier_id}', 'SupplierController@Edit')->name('supplier-edit');
Route::post('/update-supplier/{supplier_id}', 'SupplierController@Update')->name('supplier-update');


//Salary----------------------

Route::get('/add-advanced-salary', 'SalaryController@index')->name('advanced.salary');
Route::post('/insert-advanced-salary', 'SalaryController@store')->name('insert-advanced-salary');
Route::get('/all-advanced-salary', 'SalaryController@all')->name('all-advanced-salary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay-salary');

//Category-------------------------------

Route::get('/add-category', 'CategoryController@index')->name('add.category');
Route::post('/insert-category', 'CategoryController@store')->name('insert-category');
Route::get('/all-category', 'CategoryController@all')->name('all-category');
Route::get('/category-delete/{category_id}', 'CategoryController@Delete')->name('category-delete');
Route::get('/category-view/{category_id}', 'CategoryController@View')->name('category-view');
Route::get('/category-edit/{category_id}', 'CategoryController@Edit')->name('category-edit');
Route::post('/update-category/{category_id}', 'CategoryController@Update')->name('category-update');


//Product ---------------------

Route::get('/add-product', 'ProductController@index')->name('add.product');
Route::post('/insert-product', 'ProductController@store')->name('insert-product');
Route::get('/all-product', 'ProductController@all')->name('all-product');
Route::get('/product-delete/{product_id}', 'ProductController@Delete')->name('product-delete');
Route::get('/product-view/{product_id}', 'ProductController@View')->name('product-view');
Route::get('/product-edit/{product_id}', 'ProductController@Edit')->name('product-edit');
Route::post('/update-product/{product_id}', 'ProductController@Update')->name('product-update');


//Excel import Ecport
Route::get('/import-product', 'ProductController@ImportProduct')->name('import.product');
Route::get('\export', 'ProductController@export')->name('export');
Route::post('\import', 'ProductController@import')->name('import');


//Expnese----------------------
Route::get('/add-expense', 'ExpenseController@index')->name('add.expense');
Route::post('/insert-expense', 'ExpenseController@store')->name('insert-expense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today-expense');
Route::get('/edit-today-expense/{expense_id}', 'ExpenseController@TodayEditExpense');
Route::post('/edit-update-expense/{expense_id}', 'ExpenseController@TodayExpenseUpdate')->name('today-expense-update');
Route::get('/monthly-expense', 'ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense', 'ExpenseController@YearlyExpense')->name('yearly.expense');
Route::get('/january-expense', 'ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense', 'ExpenseController@februaryExpense')->name('february.expense');
Route::get('/march-expense', 'ExpenseController@JanuaryExpense')->name('march.expense');
Route::get('/april-expense', 'ExpenseController@aprilExpense')->name('april.expense');
Route::get('/may-expense', 'ExpenseController@mayExpense')->name('may.expense');
Route::get('/june-expense', 'ExpenseController@juneExpense')->name('june.expense');
Route::get('/july-expense', 'ExpenseController@julyExpense')->name('july.expense');
Route::get('/august-expense', 'ExpenseController@JanuaryExpense')->name('august.expense');
Route::get('/september-expense', 'ExpenseController@septemberExpense')->name('september.expense');
Route::get('/october-expense', 'ExpenseController@octoberExpense')->name('october.expense');
Route::get('/november-expense', 'ExpenseController@novemberExpense')->name('november.expense');
Route::get('/december-expense', 'ExpenseController@decemberExpense')->name('december.expense');
Route::get('/today-expense-delete/{id}', 'ExpenseController@Delete')->name('today-expense-delete');

//Attendence--------------------------

Route::get('/take-attendence', 'AttendenceController@index')->name('take.attendence');
Route::post('/insert-attendence', 'AttendenceController@store')->name('insert-attendence');
Route::get('/all-attendence', 'AttendenceController@allAttendence')->name('all.attendence');
Route::get('/edit-attendence/{edit_date}', 'AttendenceController@edit');
Route::get('/view-attendence/{edit_date}', 'AttendenceController@view');
Route::post('/update-attendence', 'AttendenceController@Update');
Route::get('/delete-attendence/{edit_date}', 'AttendenceController@delete');


//Setting


Route::get('/Website-setting', 'SettingController@index')->name('setting');
Route::post('/update-website/{id}', 'SettingController@Update')->name('website-update');


//Pos 
Route::get('/pos', 'PosController@index')->name('pos');
Route::get('/pending-orders', 'PosController@PendingOrders')->name('pending.orders');
Route::get('/success-orders', 'PosController@SuccessOrders')->name('success.orders');
Route::get('/view-order-status/{id}', 'PosController@ViewOrders');
Route::get('/pos-done/{id}', 'PosController@PosoDone');


//Cart
Route::post('/add-cart', 'CartController@Index')->name('add-cart');
Route::post('/cart-update/{rowId}', 'CartController@Update')->name('update-cart');
Route::get('/cart-delete/{rowId}', 'CartController@Delete');
Route::post('/invoice', 'CartController@Invoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');

